<?php

use Models\User;

require ('../config.php');

$db = new User;

//print_r($db->create("ella", "ella@email.com"));

$db->update(["amount", "=", 200], ["username", "=", "ezeko"]);

print_r ($db->all());

print_r($user = ($db->get(['username', "!=", 'ezeko'])));
echo $user[0]['amount'];
 foreach ($user as $u){
     echo $u['email'];
 }

?>