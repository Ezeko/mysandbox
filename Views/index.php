<?php

use Models\Credit;

require ('../config.php');

$db = new Credit;
$db->connectToDB('localhost', 'root', '', 'wallet-funding');

 
?>