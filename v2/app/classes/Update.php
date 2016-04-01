<?php
class Update {
    public static function switchCompletion () {
        $validation = new Validate();
        $validate->check($_POST, array(
            'action' => array(
                'name' => 'Action',
                'wildcard' => 'switch_completion'
            ),
            'table' => array(
                'name' => 'Table Name'
            ),
            'id' => array(
                'name' => 'Entry ID'
            ),
            'done' => array(
                'name' => 'Completion State'
            )
        ));

        if ($validation->passed()) {
            $completion = (empty(Input::get('done'))) ? 0 : 1;
            switch (Input::get('table')) {
                case 'assignments':
                    if (Users::isEditor()) {
                        DB::instance()->update("assignments", Input::get('id'), array('completion' => $completion));
                    }
                break;
                case 'exams':
                    if (Users::isEditor()) {
                        DB::instance()->update("exams", Input::get('id'), array('completion' => $completion));
                    }
                break;
                case 'planning':
                    if (Users::isEditor()) {
                        DB::instance()->update("planning", Input::get('id'), array('done' => $completion));
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
