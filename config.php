<?php

//autoload classes
spl_autoload_register('LoadClass');
function LoadClass ($class) {
    //add basename to remove other namespace parameters
    $path = '../Controllers/' . basename($class) . '.php';

    //var_dump(file_exists($path)); exit;

    if (!file_exists($path)){
        $model = '../Models/' . basename($class) . '.php';

        //var_dump(file_exists($model)); exit;
        
        if (!file_exists($model)){
            Echo ("Class does not exist on this path {$model}");
        }else{
            require_once($model);
            return;
        }
        
    }
    require_once($path);
}

