<?php
namespace Models;
use Settings\Database;

class UserSession{
public $conn;
 public function connectToDB(){
   $db = new Database();
   return $db->connect();
   
 }

  /**
  * Gets all usersession details from database
  * @param void
  * @return $result
  */
 public function all(){
    $sql = "SELECT * FROM `user_session` WHERE 1";
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
  * Gets user sessions from database
  * @param array $where
  * @return $result
  */
 public function get(array $where) {
   $conn = $this->connectToDB();
   
   $sql = "SELECT * from `user_session` WHERE $where[0] $where[1] '$where[2]'"; ;

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
  * Create a new userSession detail into the database
  * @param array $input
  * @return true
  */
  public function create (int $user_id, $hash) {
     $conn = $this->connectToDB();

     $sql = "INSERT INTO `user_session` (user_id, hash) VALUES ('$user_id', '$hash')";
     $query = mysqli_query($conn, $sql);
     if ($query){
        return true;
     }else{
        die(mysqli_error($conn));
        return false;
     }
  }

    /**
  * Create a new user session detail into the database
  * @param array $input
  * @return true
  */
  public function update(array $details, array $whereClause) {
     $conn = $this->connectToDB();

     $sql = "UPDATE `user_session` SET `$details[0]` $details[1] $details[2]
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
   * Deletes a User session detail from database
   * @param $whereClause
   * @return true
   */
  public function delete (array $whereClause) {
     $conn = $this->connectToDB();

     $sql = "DELETE FROM `user_session` WHERE $whereClause[0] $whereClause[1] '$whereClause[2]'";

     $query = mysqli_query($conn, $sql);

     if ($query){
      return true;
   }else{
      die(mysqli_error($conn));
      return false;
   }

  }
  

}