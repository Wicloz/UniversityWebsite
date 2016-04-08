<?php
class Update {
    public static function doUpdate () {
        if (Input::exists()) {
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
                        Notifications::addSuccess('Assignment completion switched!');
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
                        DB::instance()->update("planning", Input::get('id'), array('finished_on' => $finishedDate, 'completion' => $completion));
                        Notifications::addSuccess('Planning completion switched!');
                        Redirect::to('');
                    } else {
                        Redirect::error(403);
                    }
                break;
            }
        }

        else {
            Notifications::addValidationFail($validation->getErrors());
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
                        self::insertItemAssignment();
                    } else {
                        Redirect::error(403);
                    }
                break;
                case 'exams':
                    if (Users::isEditor()) {
                        self::insertItemExam();
                    } else {
                        Redirect::error(403);
                    }
                break;
                case 'planning':
                    if (Users::isEditor()) {
                        self::insertItemPlanning();
                    } else {
                        Redirect::error(403);
                    }
                break;
                case 'events':
                    if (Users::isEditor()) {
                        self::insertItemEvent();
                    } else {
                        Redirect::error(403);
                    }
                break;
            }
        }

        else {
            Notifications::addValidationFail($validation->getErrors());
        }
    }

    private static function insertItemAssignment () {
        $validation = new Validate();
        $validation->check($_POST, array(
            'date' => array(
                'name' => 'Date',
                'required' => false
            ),
            'time' => array(
                'name' => 'Time',
                'required' => false
            ),
            'subject' => array(
                'name' => 'Subject',
                'required' => true
            ),
            'task' => array(
                'name' => 'Task',
                'required' => true
            ),
            'team' => array(
                'name' => 'Team',
                'required' => false
            ),
            'link' => array(
                'name' => 'Assignment Link',
                'required' => false
            )
        ));

        if ($validation->passed()) {
            $id = DB::autoIncrementValue('assignments');
            DB::instance()->insert("assignments", array(
                'start_date' => DateFormat::sqlDate(),
                'end_date' => DateFormat::sql(Input::get('date').', '.Input::get('time')),
                'subject' => Input::get('subject'),
                'desc_short' => Input::get('task'),
                'team' => Input::get('team'),
                'link_assignment' => Input::get('link')
            ));
            Calendar::updateAssignment($id);
            Notifications::addSuccess('Assignment added!');
            Redirect::to("?page=assignments_item&id={$id}");
        }

        else {
            Notifications::addValidationFail($validation->getErrors());
        }
    }

    private static function insertItemExam () {
        $validation = new Validate();
        $validation->check($_POST, array(
            'date' => array(
                'name' => 'Date',
                'required' => false
            ),
            'weight' => array(
                'name' => 'Weight',
                'required' => true
            ),
            'subject' => array(
                'name' => 'Subject',
                'required' => true
            )
        ));

        if ($validation->passed()) {
            $id = DB::autoIncrementValue('exams');
            DB::instance()->insert("exams", array(
                'date' => DateFormat::sqlDate(Input::get('date')),
                'weight' => Input::get('weight'),
                'subject' => Input::get('subject')
            ));
            Notifications::addSuccess('Exam added!');
            Redirect::to("?page=exams_item&id={$id}");
        }

        else {
            Notifications::addValidationFail($validation->getErrors());
        }
    }

    private static function insertItemPlanning () {
        $validation = new Validate();
        $validation->check($_POST, array(
            'parent_table' => array(
                'name' => 'Parent Table',
                'required' => true
            ),
            'parent_id' => array(
                'name' => 'Parent ID',
                'required' => true
            ),
            'date_start' => array(
                'name' => 'Start Date',
                'required' => false
            ),
            'date_end' => array(
                'name' => 'End Date',
                'required' => false
            ),
            'duration' => array(
                'name' => 'Duration',
                'required' => false
            ),
            'goal' => array(
                'name' => 'Goal',
                'required' => true
            )
        ));

        if ($validation->passed()) {
            DB::instance()->insert("planning", array(
                'parent_table' => Input::get('parent_table'),
                'parent_id' => Input::get('parent_id'),
                'date_start' => DateFormat::sqlDate(Input::get('date_start')),
                'date_end' => DateFormat::sqlDate(Input::get('date_end')),
                'duration' => Input::get('duration'),
                'goal' => Input::get('goal')
            ));
            Notifications::addSuccess('Planning added!');
            Redirect::to('');
        }

        else {
            Notifications::addValidationFail($validation->getErrors());
        }
    }

    private static function insertItemEvent () {
        $validation = new Validate();
        $validation->check($_POST, array(
            'date' => array(
                'name' => 'Date & Time',
                'required' => false
            ),
            'subject' => array(
                'name' => 'Subject',
                'required' => true
            ),
            'task' => array(
                'name' => 'Task',
                'required' => true
            )
        ));

        if ($validation->passed()) {
            if (strpos(Input::get('task'), 'Toets') === 0 || strpos(Input::get('task'), 'Tentamen') === 0) {
                $id = DB::autoIncrementValue('exams');
                DB::instance()->insert("exams", array(
                    'date' => DateFormat::sqlDate(Input::get('date')),
                    'weight' => substr(Input::get('task'), 0, strpos(Input::get('task'), ' ')),
                    'subject' => Input::get('subject')
                ));
                Notifications::addSuccess('Exam added!');
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
                Calendar::updateAssignment($id);
                Notifications::addSuccess('Assignment added!');
                Redirect::to("?page=assignments_item&id={$id}");
            }
        }

        else {
            Notifications::addValidationFail($validation->getErrors());
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
                if (Input::get('table') === 'assignments') {
                    Calendar::updateAssignment($id);
                }
                Notifications::addSuccess('Entry inserted!');
                Redirect::to('?page=edit-entry&table='.Input::get('table').'&id='.$id);
            }

            else {
                Notifications::addValidationFail($validation->getErrors());
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
                if (Input::get('table') === 'assignments') {
                    Calendar::updateAssignment(Input::get('id'));
                }
                Notifications::addSuccess('Entry updated!');
                Redirect::to('');
            }

            else {
                Notifications::addValidationFail($validation->getErrors());
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
                if (Input::get('table') === 'assignments') {
                    Calendar::deleteAssignment(Input::get('id'));
                }
                Notifications::addSuccess('Entry deleted!');
                Redirect::to('?page=home');
            }

            else {
                Notifications::addValidationFail($validation->getErrors());
            }
        }

        else {
            Redirect::error(403);
        }
    }
}
?>
