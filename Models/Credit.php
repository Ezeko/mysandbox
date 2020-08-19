<?php
namespace Models;

use mysqli;

class Credit{
public $conn;
 public function connectToDB(){
   $db = new Database("localhost", "root", "", "wallet-funding");
   return $db->connect();
   
 }

 public function all(){
    $sql = "SELECT * FROM `users` WHERE 1";
    $conn = $this->connectToDB();
    
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($query) {
       $result = [];
       $check = mysqli_num_rows($query);
       while ($check = mysqli_fetch_Assoc($query)) {
         array_push($result, $check);
       }
       return $result;

    } else {
       echo "Error";
    }
 }

}