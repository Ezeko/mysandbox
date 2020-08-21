<?php
namespace Controllers;

use Controllers\Validate;
use Models\User;
use Models\WalletHistory;

class WalletController {
    public function checkHistory (){
        $validate = new Validate;

        $user = $validate->checkInput($_POST['username']);
        
        $validated = ($validate->validate(['username' => array('required' => true, 'min' => 2 )]));
        
        if ($validated === true)
        {
            echo "validated";
        } else {
           foreach ($validated as $error){
               echo $error . "</br>";
           }
        }
        exit;
        //check database
        $check = new User();
        $userDetail = $check->get(["username", "=", $user]);

        if ( count($userDetail) > 0 ) { 

            $history = new WalletHistory;
            $details = $history->get(["username", "=", $user]);
            
            return $details;
        } else {
            echo "<script> alert('$user is not registered'); window.location.replace('history'); </script>";
        }
    }
}