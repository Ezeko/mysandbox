<?php

use Models\UserSession;
use Settings\Cookie;
use Settings\Redirect;
use Settings\Session;

require_once("../config.php");

//delete details from database
$user_sess = new UserSession;
$cookie = Cookie::get('hash');
$get_user_sess = $user_sess->get(['hash', '=', $cookie]);

if ((count($get_user_sess)) > 0) {
    $delete = $user_sess->delete(['hash', '=', $cookie]);
    $dele_cookie = Cookie::delete('hash');
    
    $logoff = Session::destroy();

    if ($logoff){
        Redirect::To('login');
    }
    
} else {
    $logoff = Session::destroy();

    if ($logoff){
        Redirect::To('login');
    }


}
