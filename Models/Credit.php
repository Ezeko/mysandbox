<?php
namespace Models;

class Credit{

 public function connectToDB(){
    new Database("localhost", "root", "", "wallet-funding");
    
 }

}