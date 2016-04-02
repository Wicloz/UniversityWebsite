<?php
class Update {
    public static function doUpdate () {
        if (Input::exists() && Token::check(Input::get('token'))) {
            switch (Input::get('action')) {
                case 'switch_completion':
                    self::switchCompletion();
                break;
                case 'item_insert':
                    self::insertItem();
                break;
            }
        }
    }

    public static function switchCompletion () {
        $validation = new Validate();
        $validation->check($_POST, array(
            'action' => array(
                'name' => 'Action',
                'required' => true,
                'wildcard' => 'switch_completion'
            ),
            'table' => array(
                'name' => 'Table Name',
                'required' => true
            ),
            'id' => array(
                'name' => 'Entry ID',
                'required' => true
            ),
            'done' => array(
                'name' => 'Completion State',
                'required' => false
            )
        ));

        if ($validation->passed()) {
            $completion = (Input::get('done')) ? 1 : 0;
            switch (Input::get('table')) {
                case 'assignments':
                    if (Users::isEditor()) {
                        DB::instance()->update("assignments", Input::get('id'), array('completion' => $completion));
                        Session::addSuccess('Assignment completion switched!');
                        Redirect::to('');
                    } else {
                        Redirect::error(403);
                    }
                break;
                case 'planning':
                    if (Users::isEditor()) {
                        $finishedDate = 0;
                        if ($completion) {
                            $finishedDate = DateFormat::sql();
                        }
                        DB::instance()->update("planning", Input::get('id'), array('finished_on' => $finishedDate, 'done' => $completion));
                        Session::addSuccess('Planning completion switched!');
                        Redirect::to('');
                    } else {
                        Redirect::error(403);
                    }
                break;
            }
        }

        else {
            Session::addErrorArray($validation->getErrors());
        }
    }

    public static function insertItem () {
        $validation = new Validate();
        $validation->check($_POST, array(
            'action' => array(
                'name' => 'Action',
                'required' => true,
                'wildcard' => 'item_insert'
            ),
            'table' => array(
                'name' => 'Table Name',
                'required' => true
            )
        ));

        if ($validation->passed()) {
            switch (Input::get('table')) {
                case 'assignments':
                    if (Users::isEditor()) {
                        $id = DB::autoIncrementValue('assignments');
                        DB::instance()->insert("assignments", array(
                            'start_date' => DateFormat::sqlDate(),
                            'end_date' => DateFormat::sql(Input::get('date').', '.Input::get('time')),
                            'subject' => Input::get('subject'),
                            'desc_short' => Input::get('task'),
                            'link_assignment' => Input::get('link'),
                            'team' => Input::get('team')
                        ));
                        Session::addSuccess('Assignment added!');
                        Redirect::to("?page=assignments_item&id={$id}");
                    } else {
                        Redirect::error(403);
                    }
                break;
                case 'exams':
                    if (Users::isEditor()) {
                        $id = DB::autoIncrementValue('exams');
                        DB::instance()->insert("exams", array(
                            'date' => DateFormat::sqlDate(Input::get('date')),
                            'weight' => Input::get('weight'),
                            'subject' => Input::get('subject')
                        ));
                        Session::addSuccess('Exam added!');
                        Redirect::to("?page=exams_item&id={$id}");
                    } else {
                        Redirect::error(403);
                    }
                break;
                case 'planning':
                    if (Users::isEditor()) {
                        DB::instance()->insert("planning", array(
                            'parent_table' => Input::get('parent_table'),
                            'parent_id' => Input::get('parent_id'),
                            'date_start' => DateFormat::sqlDate(Input::get('date_start')),
                            'date_end' => DateFormat::sqlDate(Input::get('date_end')),
                            'duration' => Input::get('duration'),
                            'goal' => Input::get('goal')
                        ));
                        Session::addSuccess('Planning added!');
                        Redirect::to('');
                    } else {
                        Redirect::error(403);
                    }
                break;
                case 'events':
                    if (Users::isEditor()) {
                        if (strpos(Input::get('task'), 'Toets') === 0 || strpos(Input::get('task'), 'Tentamen') === 0) {
                            $id = DB::autoIncrementValue('exams');
                            DB::instance()->insert("exams", array(
                                'date' => DateFormat::sqlDate(Input::get('date')),
                                'weight' => substr(Input::get('task'), 0, strpos(Input::get('task'), ' ')),
                                'subject' => Input::get('subject')
                            ));
                            Session::addSuccess('Exam added!');
                            Redirect::to("?page=exams_item&id={$id}");
                        }
                        else {
                            $id = DB::autoIncrementValue('assignments');
                            DB::instance()->insert("assignments", array(
                                'start_date' => DateFormat::sqlDate(),
                                'end_date' => DateFormat::sql(Input::get('date')),
                                'subject' => Input::get('subject'),
                                'desc_short' => Input::get('task')
                            ));
                            Session::addSuccess('Assignment added!');
                            Redirect::to("?page=assignments_item&id={$id}");
                        }
                    } else {
                        Redirect::error(403);
                    }
                break;
            }
        }

        else {
            Session::addErrorArray($validation->getErrors());
        }
    }

    public static function adminInsertItem () {
        if (Users::isAdmin()) {
            $validation = new Validate();
            $validation->check($_POST, array(
                'action' => array(
                    'name' => 'Action',
                    'required' => true,
                    'wildcard' => 'admin_item_insert'
                ),
                'table' => array(
                    'name' => 'Table Name',
                    'required' => true
                ),
                'id' => array(
                    'name' => 'Entry ID',
                    'required' => true,
                    'wildcard' => 'create'
                )
            ));

            if ($validation->passed()) {
                $data = array();
                foreach ($_POST as $key => $value) {
                    if (!empty($value) && $key !== 'token' && $key !== 'action' && $key !== 'table' && $key !== 'id') {
                        $data[$key] = $value;
                    }
                }
                $id = DB::autoIncrementValue(Input::get('table'));
                DB::instance()->insert(Input::get('table'), $data);
                Session::addSuccess('Entry inserted!');
                Redirect::to('?page=edit-entry&table='.Input::get('table').'&id='.$id);
            }

            else {
                Session::addErrorArray($validation->getErrors());
            }
        }

        else {
            Redirect::error(403);
        }
    }

    public static function adminUpdateItem () {
        if (Users::isAdmin()) {
            $validation = new Validate();
            $validation->check($_POST, array(
                'action' => array(
                    'name' => 'Action',
                    'required' => true,
                    'wildcard' => 'admin_item_update'
                ),
                'table' => array(
                    'name' => 'Table Name',
                    'required' => true
                ),
                'id' => array(
                    'name' => 'Entry ID',
                    'required' => true
                )
            ));

            if ($validation->passed()) {
                $data = array();
                foreach ($_POST as $key => $value) {
                    if (!empty($value) && $key !== 'token' && $key !== 'action' && $key !== 'table' && $key !== 'id') {
                        $data[$key] = $value;
                    }
                }
                DB::instance()->update(Input::get('table'), Input::get('id'), $data);
                Session::addSuccess('Entry updated!');
                Redirect::to('');
            }

            else {
                Session::addErrorArray($validation->getErrors());
            }
        }

        else {
            Redirect::error(403);
        }
    }

    public static function adminDeleteItem () {
        if (Users::isAdmin()) {
            $validation = new Validate();
            $validation->check($_POST, array(
                'action' => array(
                    'name' => 'Action',
                    'required' => true,
                    'wildcard' => 'admin_item_delete'
                ),
                'table' => array(
                    'name' => 'Table Name',
                    'required' => true
                ),
                'id' => array(
                    'name' => 'Entry ID',
                    'required' => true
                )
            ));

            if ($validation->passed()) {
                DB::instance()->delete(Input::get('table'), array("", "id", "=", Input::get('id')));
                Session::addSuccess('Entry deleted!');
                Redirect::to('?page=home');
            }

            else {
                Session::addErrorArray($validation->getErrors());
            }
        }

        else {
            Redirect::error(403);
        }
    }
}
?>
