<?php
namespace Controllers;

class Validate {

    public function checkInput ( $input ) {
        trim($input); //remove extra spaces
        stripslashes( $input); //strip slashes
        htmlspecialchars($input); // encode special characters

        return $input;
    }
}