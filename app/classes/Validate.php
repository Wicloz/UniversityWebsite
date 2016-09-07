<?php
class Validate {
    private $_passed = false,
            $_errors = array(),
            $_db = null;

    public function __construct () {
        $this->_db = DB::instance();
    }

    public function check ($source, $items = array()) {
        foreach ($items as $item => $rules) {
            $mustCheck = true;
            $item_value = $source[$item];

            foreach ($rules as $rule_key => $rule_value) {
                if ($rule_key === 'required' && $rule_value && empty($item_value)) {
                    $this->addError("'{$rules['name']}' is required but was empty.");
                    $mustCheck = false;
                    break;
                }
            }

            if ($mustCheck && !empty($item_value)) {
                foreach ($rules as $rule_key => $rule_value) {
                    if ($rule_key !== 'name' && $rule_key !== 'required') {
                        switch ($rule_key) {
                            case 'min':
                                if (strlen($item_value) < $rule_value) {
                                    $this->addError("'{$rules['name']}' was of length ".strlen($item_value)." but must be of minimal length ".$rule_value.".");
                                }
                            break;

                            case 'max':
                                if (strlen($item_value) > $rule_value) {
                                    $this->addError("'{$rules['name']}' was of length ".strlen($item_value)." but must be of maximum length ".$rule_value.".");
                                }
                            break;

                            case 'wildcard':
                                if (!fnmatch($rule_value, $item_value)) {
                                    $this->addError("'{$rules['name']}' must match the pattern {$rule_value} but does not.");
                                }
                            break;

                            case 'matches':
                                if ($item_value !== $source[$rule_value]) {
                                    $this->addError("'{$rules['name']}' must be equal to the field '{$items[$rule_value]['name']}' but was not.");
                                }
                            break;

                            case 'unique':
                                $rule_values = explode('/', $rule_value);
                                $check = $this->_db->get($rule_values[0], array("", $rule_values[1], "=", $item_value));
                                if ($check->count() > 0) {
                                    $this->addError("'{$rules['name']}' must be unique but is already taken.");
                                }
                            break;

                            case 'ofType':
                                foreach ($rule_value as $type) {
                                    $this->checkType($item_value, $rules['name'], $type);
                                }
                            break;
                        }
                    }
                }
            }
        }

        if (empty($this->_errors)) {
            $this->_passed = true;
        }
    }

    private function checkType ($value, $name, $type) {
        switch ($type) {
            case 'email':
                if (!fnmatch('*@*.*', $value)) {
                    $this->addError("'{$name}' must be a valid email address.");
                }
            break;

            case 'phone':
                if (!Phone::validNumber($value)) {
                    $this->addError("'{$name}' must be a valid phone number.");
                }
            break;
        }
    }

    private function addError ($error) {
        $this->_errors[] = $error;
    }

    public function getErrors () {
        return $this->_errors;
    }

    public function passed () {
        return $this->_passed;
    }
}
?>
