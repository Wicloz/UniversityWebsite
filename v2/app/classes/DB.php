<?php
class DB {
    private static $_instance = null;
    private $_mysql,
            $_pdo,
            $_query,
            $_error = false,
            $_results = array(),
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
        $params = array_values($params);

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

    public function results ($index = -1) {
        if ($index >= 0) {
            if ($index < count($this->_results)) {
                return $this->_results[$index];
            } else {
                return $this->_results[count($this->_results) - 1];
            }
        }
        return $this->_results;
    }

    public function first () {
        return $this->results(0);
    }

    private function action ($action, $table, $where = array()) {
        $action = $this->_mysql->escape_string($action);
        $table = $this->_mysql->escape_string($table);
        $values = array();
        $sql = "";

        if (count($where) !== 0 && count($where) % 4 === 0) {
            $inversions_allowed = array('', 'NOT');
            $operators_allowed = array('=', '>', '<', '>=', '<=');
            $concatenators_allowed = array('OR', 'AND', 'OR NOT', 'AND NOT');

            $sql = "{$action} FROM {$table} WHERE ";

            for ($i = 0; $i < count($where); $i += 4) {
                if (in_array($where[$i + 0], $concatenators_allowed) || ($i === 0 && in_array($where[$i + 0], $inversions_allowed))) {
                    $sql .= $where[$i + 0].' ';
                } else {
                    die('Invalid Query Request: ' . implode(', ', $where));
                }

                $sql .= $this->_mysql->escape_string($where[$i + 1]).' ';

                if (in_array($where[$i + 2], $operators_allowed)) {
                    $sql .= $where[$i + 2].' ? ';
                } else {
                    die('Invalid Query Request: ' . implode(', ', $where));
                }

                $values[] = $where[$i + 3];
            }
        }

        elseif (count($where) > 0) {
            die('Invalid Query Request Length (' . count($where) . '): ' . implode(', ', $where));
        }

        else {
            $sql = "{$action} FROM {$table}";
        }

        if (!empty($sql)) {
            $this->query($sql, $values);
            return $this;
        }

        return false;
    }

    public function get ($table, $where = array()) {
        return $this->action("SELECT *", $table, $where);
    }

    public function delete ($table, $where = array()) {
        return $this->action("DELETE", $table, $where);
    }

    public function insert ($table, $data = array()) {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $key_items[] = $this->_mysql->escape_string($key);
                $value_items[] = '?';
            }

            $keys = '`'.implode('`, `', $key_items).'`';
            $values = implode(', ', $value_items);
            $sql = "INSERT INTO {$this->_mysql->escape_string($table)} ({$keys}) VALUES ({$values})";

            $this->query($sql, $data);
            return $this;
        }
        return false;
    }

    public function update ($table, $id, $data = array()) {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
        		$updates[] = $this->_mysql->escape_string($key).' = ?';
        	}

        	$update = implode(', ', $updates);
            $sql = "UPDATE {$this->_mysql->escape_string($table)} SET {$update} WHERE id = {$id}";

            $this->query($sql, $data);
            return $this;
        }
        return false;
    }

    public function autoIncrementValue ($table) {
    	return $this->query("SHOW TABLE STATUS LIKE ?", array($this->_mysql->escape_string($table)));
    }

    public function tableFormInfo ($table) {
    	return $this->query("SELECT COLUMN_NAME, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=? AND TABLE_NAME=?", array(Config::get('mysql/db'), $this->_mysql->escape_string($table)));
    }
}
?>
