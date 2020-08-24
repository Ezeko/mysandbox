<?php

namespace Settings;

class Cookie {
    /**
     * Creates a new cookie
     * @param cookie, $cookie_value
     * @return true
     */
    public static function set (string $cookie, $cookie_value)
    {
        $created = setcookie($cookie, $cookie_value, time() + (86400 * 30), '/');
        if ($created){
            return true;
        }
        return false;
    }

    /**
     * Gets a particular cookie instance 
     * @param cookie_name
     * @return cookie_value
     */
    public static function get(string $cookie_name)
    {
        $exist = self::exists($cookie_name);
        if ($exist ){
            return $_COOKIE[$cookie_name];
        }
        return false;
    }

    /**
     * Checks if cookie exist
     * @param string $cookie_name
     * @return true
     */
    public static function exists (string $cookie_name)
    {
        if (isset($_COOKIE[$cookie_name])){
            return true;
        }
        return false;
    }

    /**
     * Deletes a particular cookie instance
     * @param string $cookie_name
     * @return true
     */
    public static function delete(string $cookie_name){
        //check if it exist
        $check = self::exists($cookie_name);

        if ($check){
            $deleted = setcookie($cookie_name, "" , time() - 3600);
            if ($deleted) {
                return true;
            }
            return false;
        }
        return false;
        
    }

}