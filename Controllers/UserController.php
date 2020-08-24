<?php

namespace Controllers;

use Models\User;
use Settings\Redirect;
use Settings\Session;
use Settings\Validation;

class UserController {
    /**
     * Logs user in
     * @param input::details
     * @return 
     * 
     */
    public function login(){
        $validated = new Validation;

        $username = $validated->checkInput($_POST['user']);
        $password = $validated->checkInput($_POST['password']);
        //backend check

        $check_user = $validated->validate((['user' => array('required' => true, 'min' => 2 )]));

        $check_pass = $validated->validate((['password' => array('required' => true, 'min' => 2 )]));
        if ($check_pass === true && $check_user === true) {
            //login
            $check = new User();
            $userDetail = $check->get(["username = '$username'", "OR email =", $username]);
            

            if (count($userDetail > 0) ) {
                $verify_password = password_verify($password, $userDetail[0]['password']);
                if ($verify_password){
                    Session::set('id', $userDetail[0]['id']);
                    Redirect::To('dashboard');
                }
                else{
                    $messages = "Password incorrect";
                    return $messages;
                }
            }
        }else{
            $messages = "Not validated";
        }
    }
}