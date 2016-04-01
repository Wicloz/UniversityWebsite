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
            $completion = (Input::get('done')) ? 0 : 1;
            switch (Input::get('table')) {
                case 'assignments':
                    if (Users::isEditor()) {
                        DB::instance()->update("assignments", Input::get('id'), array('completion' => $completion));
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
                        $id = DB::instance()->autoIncrementValue('assignments');
                        DB::instance()->insert("assignments", array(
                            'start_date' => DateFormat::sqlDate(),
                            'end_date' => DateFormat::sql(Input::get('date').', '.Input::get('time')),
                            'subject' => Input::get('subject'),
                            'desc_short' => Input::get('task'),
                            'link_assignment' => Input::get('link'),
                            'team' => Input::get('team')
                        ));
                        Redirect::to("?page=assignments_item&id={$id}");
                    } else {
                        Redirect::error(403);
                    }
                break;
                case 'exams':
                    if (Users::isEditor()) {
                        $id = DB::instance()->autoIncrementValue('exams');
                        DB::instance()->insert("exams", array(
                            'date' => DateFormat::sqlDate(Input::get('date')),
                            'weight' => Input::get('weight'),
                            'subject' => Input::get('subject')
                        ));
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
                        Redirect::to('');
                    } else {
                        Redirect::error(403);
                    }
                break;
                case 'events':
                    if (Users::isEditor()) {
                        if (strpos(Input::get('task'), 'Toets') === 0 || strpos(Input::get('task'), 'Tentamen') === 0) {
                            $id = DB::instance()->autoIncrementValue('exams');
                            DB::instance()->insert("exams", array(
                                'date' => DateFormat::sqlDate(Input::get('date')),
                                'weight' => substr(Input::get('task'), 0, strpos(Input::get('task'), ' ')),
                                'subject' => Input::get('subject')
                            ));
                            Redirect::to("?page=exams_item&id={$id}");
                        }
                        else {
                            $id = DB::instance()->autoIncrementValue('assignments');
                            DB::instance()->insert("assignments", array(
                                'start_date' => DateFormat::sqlDate(),
                                'end_date' => DateFormat::sql(Input::get('date')),
                                'subject' => Input::get('subject'),
                                'desc_short' => Input::get('task')
                            ));
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
}
?>
