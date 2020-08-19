<?php
namespace Models;
class Database {

    private $db_host,
    $db_user,
    $db_pwd,
    $db_name;

    public function __construct( $host, $db_user, $db_pwd, $db_name)
    {
        $this->db_user = $db_user;
        $this->db_host = $host;
        $this->db_pwd = $db_pwd ;
        $this->db_name = $db_name;
    }

    public function connect ( )
    {
        try{
            $connect = mysqli_connect($this->db_host, $this->db_user, $this->db_pwd, $this->db_name);

            if ($connect) {
                //echo "connected to database {$this->db_name} successfully";
                return $connect;
            }else {
                echo "Error not connected";
                return false;
            }
            return $connect;
            
        } catch ( \Exception $e) {
            return "Error!". $e->getMessage();
        }
        
    }
}