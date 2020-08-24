<?php

namespace Models;
 
class Config {
    public static function get(string $config_name) {
        $config = $GLOBALS['config'];
        if (!isset($config[$config_name])){
            return ("{$config_name} not set");
        }
        return ("{$config[$config_name]}");
    }

    public static function set(array $config_details) {
        $config = $GLOBALS['config'];
        foreach ($config_details as $config_detail => $config_value) {
            if (!isset($config[$config_detail])) {
                return "Already does not exist";
            } else {
                $config[$config_detail] = $config_value;
                return "created";
            }
        }
    }
}