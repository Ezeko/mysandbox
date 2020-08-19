<?php
namespace Models;


class WalletHistory{
public $conn;
 public function connectToDB(){
   $db = new Database("localhost", "root", "", "wallet-funding");
   return $db->connect();
   
 }

  /**
  * Gets all users history from wallet
  * @param void
  * @return $result
  */
 public function all(){
    $sql = "SELECT * FROM `wallet_history` WHERE 1";
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
  * Gets user history from wallet
  * @param array $where
  * @return $result
  */
 public function get(array $where) {
   $conn = $this->connectToDB();
   
   $sql = "SELECT * from `wallet_history` WHERE `$where[0]` $where[1] '$where[2]'"; ;

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
  * Create a new user wallet history into the database
  * @param array $input
  * @return true
  */
  public function create (string $username, int $amount, string $description, int $balance) {
     $conn = $this->connectToDB();

     $sql = "INSERT INTO `wallet_history` (username, amount, description, balance) 
     VALUES ('$username', $amount, '$description', $balance)";
     $query = mysqli_query($conn, $sql);
     if ($query){
        return true;
     }else{
        die(mysqli_error($conn));
        return false;
     }
  }

    /**
  * Update a  user wallet history detail in the database
  * @param array $input
  * @return true
  */
  public function update(array $details, array $whereClause) {
     $conn = $this->connectToDB();

     $sql = "UPDATE `wallet_history` SET `$details[0]` $details[1] $details[2]
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
   * Deletes a User history from wallet_history
   * @param $whereClause
   * @return true
   */
  public function delete (array $whereClause) {
     $conn = $this->connectToDB();

     $sql = "DELETE FROM `wallet_history` WHERE $whereClause[0] $whereClause[1] '$whereClause[2]'";

     $query = mysqli_query($conn, $sql);

     if ($query){
      return true;
   }else{
      die(mysqli_error($conn));
      return false;
   }

  }
  

}