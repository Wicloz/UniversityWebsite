<?php
class Update {
    public static function doUpdate () {
        if (Input::exists() && Token::check(Input::get('token'))) {
            switch (Input::get('action')) {
                case 'switch_completion':
                    Update::switchCompletion();
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
            $completion = (empty(Input::get('done'))) ? 0 : 1;
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
                        DB::instance()->update("planning", Input::get('id'), array('done' => $completion));
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
}
?>
