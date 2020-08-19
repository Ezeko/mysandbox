<?php

use Models\User;

require ('../config.php');

$db = new User;

//print_r($db->create("ella", "ella@email.com"));

$db->delete(["username", "=", "ella"]);

print_r ($db->all());

print_r($user = ($db->get(['username', "!=", 'ezeko'])));
echo $user[0]['amount'];
 foreach ($user as $u){
     echo $u['email'];
 }

?>