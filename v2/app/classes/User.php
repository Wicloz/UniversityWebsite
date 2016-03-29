<?php
class User {
    private $_db,
            $_userdata = null,
            $_loggedIn = false;

    public function __construct ($userId = 0) {
        $this->_db = DB::instance();

        if (empty($userId)) {
            if (Session::exists(Config::get('session/loggedId'))) {
                if ($this->setData(Session::get(Config::get('session/loggedId')))) {
                    $this->_loggedIn = true;
                } else {
                    Users::logout();
                }
            }
        }

        else {
            $this->setData($userId);
        }
    }

    public function setData ($userid = 0) {
        $field = (is_numeric($userid)) ? 'id' : 'student_id';
        $data = $this->_db->get("users", array("", $field, "=", $userid));

        if ($data->count()) {
            $this->_userdata = $data->first();
            return true;
        }

        return false;
    }

    public function update ($data = array(), $permission = false) {
        if ($this->_loggedIn || $permission) {
            $this->_db->update("users", $this->id(), $data);
            $this->setData($this->id());
            return true;
        }
        return false;
    }

    public function id () {
        return $this->data()->id;
    }

    public function data () {
        return $this->_userdata;
    }

    public function exists () {
        return !empty($this->_userdata);
    }

    public function isLoggedIn () {
        return ($this->_loggedIn && $this->exists());
    }
}
?>
