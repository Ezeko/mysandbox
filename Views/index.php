<?php

use Models\Credit;

require ('../config.php');

$db = new Credit;

print_r ($db->all());
 
?>