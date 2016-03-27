<?php
class DB {
    private static $_instance = null;
    private $_mysql,
            $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;

    private function __construct () {
        try {
            $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            $this->_mysql = new mysqli(Config::get('mysql/host'), Config::get('mysql/username'), Config::get('mysql/password'), Config::get('mysql/db'));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function instance ($reset = false) {
        if (!isset(self::$_instance) || $reset) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query ($sql, $params = array()) {
        $this->_error = false;
        $this->_count = 0;

        if ($this->_query = $this->_pdo->prepare($sql)) {
            if (count($params)) {
                foreach ($params as $index => $param) {
                    $this->_query->bindValue($index + 1, $this->_mysql->escape_string($param));
                }
            }

            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }
            else {
                $this->_error = $this->_query->errorInfo();
            }
        }

        return $this;
    }

    public function error () {
        if ($this->_error) {
            $this->_error = implode(', ', $this->_error);
        }
        return $this->_error;
    }

    public function count () {
        return $this->_count;
    }

    private function action ($action, $table, $where = array()) {
        $values = array();

        if (count($where) > 0) {
            $operators = array('==', '>', '<', '>=', '<=');
            $field = $where[0];
            $operator = $where[1];
            $values = array($where[2]);
            $sql = "{$action} FROM {$table} WHERE {$field} {$operator} '?'";
        }

        else {
            $sql = "{$action} FROM {$table}";
        }

        if (isset($sql)) {
            if (!$this->query($sql, $values)->error()) {
                return $this;
            }
        }

        return false;
    }

    public function get ($table, $where = array()) {
        return $this->action("SELECT *", $table, $where);
    }

    public function delete ($table, $where = array()) {
        return $this->action("DELETE", $table, $where);
    }

    public function autoIncrementValue ($table) {
    	return $this->query("SHOW TABLE STATUS LIKE '?'", array($table));
    }

    public function tableFormInfo ($table) {
    	return $this->query("SELECT COLUMN_NAME, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='?' AND TABLE_NAME='?'", array(Config::get('mysql/db'), $table));
    }
}
?>
