<?php

use Settings\Redirect;
use Settings\Session;
use Settings\Config;
use Settings\Database;
use Models\User;
use Settings\Cookie;
use Settings\Token;

require ('../config.php');

echo Token::check("6bc59ab3a0d47020ff9de3aa3e925bf4"); exit;
echo password_verify('password', '$2y$10$ojv2OPXAOi9.0.e9xtVIsOlv3rxfkNLToCwTWCWJP0Q5O/nckusTy'); exit;
var_dump(hash('sha256', uniqid()));
$cookie = new Cookie;
var_dump($cookie::delete("name"));
$session = new Session;
$session::destroy();
$session::set('id', 4);
echo $session::get('id'); exit;
$red = new Redirect;
Redirect::To('credit'); exit;
$db = new Database;
//var_dump($db->connect());
//$db = new User;
$con = new Config;

echo $con::get('db_name'), "</br>";
echo $con::set(['db_name' => 'ezeko']);
echo $con::get('db_name');
/*
//print_r($db->create("ella", "ella@email.com"));

$db->delete(["username", "=", "ella"]);

print_r ($db->all());

print_r($user = ($db->get(['username', "!=", 'ezeko'])));
echo $user[0]['amount'];
 foreach ($user as $u){
     echo $u['email'];
 }*/
/*
 $curl = curl_init();
  
 curl_setopt_array($curl, array(
   CURLOPT_URL => "https://api.paystack.co/transaction",
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "GET",
   CURLOPT_HTTPHEADER => array(
     "Authorization: Bearer sk_test_b54160497bac8f7e4a25aca71f1f6c33c945e4b1",
     "Cache-Control: no-cache",
   ),
 ));
 
 $response = curl_exec($curl);
 $err = curl_error($curl);
 curl_close($curl);
 
 if ($err) {
   echo "cURL Error #:" . $err;
 } else {
   echo $response;
 }
return;

 $url = "https://api.paystack.co/transaction/initialize";
 $fields = [
   'email' => "customer@email.com",
   'amount' => "20000",
 ];
 $fields_string = http_build_query($fields);
 //open connection
 $ch = curl_init();
 
 //set the url, number of POST vars, POST data
 curl_setopt($ch,CURLOPT_URL, $url);
 curl_setopt($ch,CURLOPT_POST, true);
 curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   "Authorization: Bearer sk_test_b54160497bac8f7e4a25aca71f1f6c33c945e4b1",
   "Cache-Control: no-cache",
 ));
 
 //So that curl_exec returns the contents of the cURL; rather than echoing it
 curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
 
 //execute post
 $result = curl_exec($ch);
 $url = ( (json_decode($result))->data->authorization_url);

 $ref = basename($url);
 
 header("Location: $url");
 

 $curl = curl_init();
  
 curl_setopt_array($curl, array(
   CURLOPT_URL => "https://api.paystack.co/transaction/verify/mxmms6bj6o",
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "GET",
   CURLOPT_HTTPHEADER => array(
     "Authorization: Bearer sk_test_b54160497bac8f7e4a25aca71f1f6c33c945e4b1",
     "Cache-Control: no-cache",
   ),
 ));
 
 $response = curl_exec($curl);
 $err = curl_error($curl);
 curl_close($curl);
 
 if ($err) {
   echo "cURL Error #:" . $err;
 } else {
   echo $response;
 }
*/