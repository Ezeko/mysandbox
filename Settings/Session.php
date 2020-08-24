<?php

namespace Settings;

class Session {
    /**
     * Sets an instance of session
     * @param $session_name
     * @return true
     */
    public static function set(string $name, $value)
    {
        $_SESSION[$name] = $value;
        return true;
    }

    /**
     * Gets an instance of session
     * @param $session_name
     * @return true
     */
    public static function get(string $name)
    {
        $exists = self::exists($name);
        if ($exists){
            return $_SESSION[$name];
        } 

        return ("Error, $name not saved in session");

    }

    /**
     * Checks an instance of session
     * @param $session_name
     * @return true
     */
    public static function exists (string $session_name)
    {
        if (isset($_SESSION[$session_name])){
            return true;
        }
        return false;
    }

    /**
     * Deletes an instance of session
     * @param $session_name
     * @return true
     */
    public static function delete(string $session_name)
    {
        $checked = self::exists($session_name);

        if ($checked) {
            unset($_SESSION[$session_name]);
            return true;
        }
        
        return false;
    }

    /**
     * Destroy session
     * @param $session_name
     * @return true
     */

    public static function destroy()
    {

        $destroyed = session_destroy();

        if ($destroyed) {
            return true;
        }
        return false;
    }

}