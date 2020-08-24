<?php
namespace Settings;
class Database {

    private $db_host,
    $db_user,
    $db_pwd,
    $db_name;

    public function __construct( )
    {
        $config = new Config;

        $this->db_user = $config::get('db_user');
        $this->db_host = $config::get('db_host');
        $this->db_pwd = $config::get('db_password');
        $this->db_name = $config::get('db_name');
        
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