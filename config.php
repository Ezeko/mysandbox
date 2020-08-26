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
    $path = '../Controllers/' . $data . '.php';

    //var_dump(file_exists($path)); exit;

    if (!file_exists($path)){
        $model = '../Models/' . $data . '.php';

        //var_dump(file_exists($model)); exit;
        
        if (!file_exists($model)){
            //Echo ("Class does not exist on this path {$model}");
            $setting = '../Settings/' . $data . '.php';
            if (!file_exists($setting)){
                Echo ("Class does not exist on this path " .($setting));
            }else{
                require_once($setting);
                return;
            }
        }else{
            require_once($model);
            return;
        }
        
    }
    require_once($path);
}

