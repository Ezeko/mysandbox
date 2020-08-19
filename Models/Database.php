<?php
namespace Models;
class Database {

    private $db_host,
    $db_user,
    $db_pwd,
    $db_name;

    public function __construct( $db_host, $db_user, $db_pwd, $db_name)
    {
        $this->connect( $db_host, $db_user, $db_pwd, $db_name);
    }

    protected function connect ( $host, $user, $pwd, $db_name )
    {
        try{
            $connect = mysqli_connect($host, $user, $pwd, $db_name);

            if ( !$connect ) {
                return "Error not connected";
            } else {
                echo "connected to database {$db_name} successfully";
            }
        } catch ( \Exception $e) {
            return "Error!". $e->getMessage();
        }
        
    }
}