<?php
namespace Settings;

class Validation {
    private $_errors = [];
    public function checkInput ( $input ) {
        $trim = trim($input); //remove extra spaces
        $strip = stripslashes( $trim); //strip slashes
        return ($data = htmlspecialchars($strip)); // encode special characters

        return $data;
    }

    public static function sanitize ( $data ){
        $sanitized = htmlentities($data, ENT_QUOTES, 'UTF-8', true );
        return $sanitized;
    }

    public function validate ( array $inputs ) {
        foreach ($inputs as $input => $inputs_value ) {
            
            //print_r ($input);
            foreach ( $inputs_value as $input_value => $rule_value)  {
                //print_r($input_value);
                switch ( $input_value ) {
                    case 'required' : if (isset($_POST[$input])
                    || isset($_GET[$input])
                    && $rule_value == true ) {
                         if( ((strlen( $_POST[$input])) < 1) ) {
                            array_push($this->_errors, "{$input} is {$input_value}");
                         break;
                         }
                        } else {
                            array_push($this->_errors, "{$input} is {$input_value}, it cannot be empty");
                        break;
                        }
                    break;

                    case 'max': if (strlen($_POST[$input] > $rule_value)) {
                        array_push($this->_errors, "{$input}'s length cannot be greater than {$rule_value}");
                    }
                    break;
                    case 'min': if (strlen($_POST[$input]) < $rule_value) {
                        array_push($this->_errors, "{$input}'s length cannot be lesser than {$rule_value}");
                    }
                    break;
                    default: array_push ($this->_errors, "Error! {$input_value} not set");
                }
            }
        }
        if (count($this->_errors) > 0) {
            return ($this->_errors);
        } else {
            return true;
        }
    }
}