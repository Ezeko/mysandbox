<?php

use Settings\Redirect;
use Settings\Session;

require_once("../config.php");

$logoff = Session::destroy();

if ($logoff){
    Redirect::To('login');
}