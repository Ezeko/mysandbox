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

        $check_user = $validated->validate((['user' => array('required' => true, 'min' => 4 )]));

        $check_pass = $validated->validate((['password' => array('required' => true, 'min' => 6 )]));
        if ($check_pass === true && $check_user === true) {
            //login
            $check = new User();
            $userDetail = $check->get(["username = '$username'", "OR email =", $username]);
            

            if (count($userDetail) > 0 ) {
                $verify_password = password_verify($password, $userDetail[0]['password']);
                if ($verify_password){
                    Session::set('username', $userDetail[0]['username']);
                    
                    Redirect::To('dashboard');
                }
                else{
                    $messages = "Password incorrect";
                    return $messages;
                }
            } else {
                $messages = "Invalid User Details";
                return $messages;
            }
        } else{
            $messages = "Not validated";
            return $messages;
        }
    }

    public function signup()
    {
        $valid = new Validation;
        $username = $valid->checkInput($_POST['username']);
        $email = $valid->checkInput($_POST['email']);
        $password1 = $valid->checkInput($_POST['password']);
        $password2 = $valid->checkInput($_POST['password_confirm']);

        $check_user = $valid->validate(['username' => ['required'=> true, 'min' => 4]]);
        $check_mail = $valid->validate(['email' => ['required'=> true]]);
        $check_pass = $valid->validate(['password' => ['required'=> true, 'min' => 6]]);

        if ($password1 === $password2 ){
            //continue registration
            $password = password_hash($password1, PASSWORD_BCRYPT);
            if ($check_user === true && $check_mail === true && $check_pass === true){
                //continue
                $user = new User;
                $saved = $user->create($username, $email, $password);
                if (!$saved) {
                    echo "<script> alert('Something occured! could not save user\'s details'); </script>";
                }
                echo 'user registered successfully';
                Redirect::To('login');
            }else{
                if ($check_mail !== true ){
                    echo "<script> alert('Email details must be filled.'); </script>";
                } else if ($check_pass !== true){
                    echo "<script> alert('Password must be filled and more than 5 characters'); </script>";
                } else {
                    echo "<script> alert('Username field cannot be empty and it should be more than 3 characters'); </script>";
                }
            }

        } else {
            echo "<script> alert('Password does not match'); </script>";
        }

    }
}