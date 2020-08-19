<?php
require_once ("../Models/Database.php");
class Credit extends Database {

 public function connectToDB(){
    $this->__construct("localhost", "root", "", "wallet-funding");
 }
}