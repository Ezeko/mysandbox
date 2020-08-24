<?php

namespace Settings;

class Hash {
    /**
     * Create hashed 
     * @param $data
     * @return $hashed
     */
    public static function make(string $data, $salt = '')
    {
        $hashed = hash('sha256', $data - $salt);

        return $hashed;
    }

    /**
     * Make unique hash
     * @param void
     * @return $hashed
     */
    public static function unique(){
        $hashed = self::make(uniqid());

        return $hashed;
    }
}