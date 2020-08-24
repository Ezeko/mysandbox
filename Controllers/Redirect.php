<?php

namespace Controllers;

class Redirect {

    public static function To(string $destination)
    {
        $validate = new Validation;
        $path = $validate->checkInput($destination);
        
        if (file_exists($path . '.php')){
            return header("Location: $path");
        } else{
            return header("Location: 404");
        }
    
    }
}