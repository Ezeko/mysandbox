<?php

namespace Controllers;

class Session {

    public static function set(string $name, $value)
    {
        $_SESSION[$name] = $value;
        return true;
    }

    public static function get(string $name)
    {
        return $_SESSION[$name];
    }
}