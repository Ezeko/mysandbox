<?php
namespace Models;
use Settings\Database;

class User{
public $conn;
 public function connectToDB(){
   $db = new Database();
   return $db->connect();
   
 }

  /**
  * Gets all users details from database
  * @param void
  * @return $result
  */
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
       return "Error ". mysqli_error($conn);
    }
 }

 /**
  * Gets user details from database
  * @param array $where
  * @return $result
  */
 public function get(array $where) {
   $conn = $this->connectToDB();
   
   $sql = "SELECT * from `users` WHERE $where[0] $where[1] '$where[2]'"; ;

   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($query) {
       $result = [];
       $check = mysqli_num_rows($query);
       while ($check = mysqli_fetch_Assoc($query)) {
         array_push($result, $check);
       }
       return $result;

    } else {
       return "Error ". mysqli_error($conn);
    }
 }

  /**
  * Create a new user detail into the database
  * @param array $input
  * @return true
  */
  public function create (string $username, string $email, string $password) {
     $conn = $this->connectToDB();

     $sql = "INSERT INTO `users` (username, email, password) VALUES ('$username', '$email', '$password')";
     $query = mysqli_query($conn, $sql);
     if ($query){
        return true;
     }else{
        die(mysqli_error($conn));
        return false;
     }
  }

    /**
  * Create a new user detail into the database
  * @param array $input
  * @return true
  */
  public function update(array $details, array $whereClause) {
     $conn = $this->connectToDB();

     $sql = "UPDATE `users` SET `$details[0]` $details[1] $details[2]
     WHERE `$whereClause[0]` $whereClause[1] '$whereClause[2]' ";

     $query = mysqli_query($conn, $sql);

     if ($query){
      return true;
   }else{
      die(mysqli_error($conn));
      return false;
   }

  }

  /**
   * Deletes a User detail from database
   * @param $whereClause
   * @return true
   */
  public function delete (array $whereClause) {
     $conn = $this->connectToDB();

     $sql = "DELETE FROM `users` WHERE $whereClause[0] $whereClause[1] '$whereClause[2]'";

     $query = mysqli_query($conn, $sql);

     if ($query){
      return true;
   }else{
      die(mysqli_error($conn));
      return false;
   }

  }
  

}