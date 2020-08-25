<?php

use Settings\Redirect;
use Settings\Session;

require_once ("../config.php");
$username = Session::get('username');
if (!$username) {
    Redirect::To('login');
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <div>Welcome <?php echo $username ?></div>
        <a href="logout"> Logout Here </a>
    </body>
</html>