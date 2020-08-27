<?php
session_start();
 $GLOBALS['config'] = [
     'db_name' => 'wallet-funding',
     'db_host' => 'localhost',
     'db_password' => '',
     'db_user' => 'root'
 ];
//autoload classes
spl_autoload_register('LoadClass');
function LoadClass ($class) {
    $data = basename($class);
    //add basename to remove other namespace parameters
    if ($_SERVER['SERVER_NAME'] !== 'localhost') {
       $path = $_SERVER['SERVER_NAME'] . '\\' . $class . '.php';
    } else {
        $path = __DIR__. '\\' . ($class) . '.php';
    }


    //var_dump(file_exists($path)); exit;

    if (!file_exists($path)){
            echo basename($data) . "</br>";
            Echo ("Class does not exist on this path " .($path));
            
        }else{
            require_once($path);
            return;
        }
        
    
    
}

