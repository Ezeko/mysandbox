<?php
namespace Controllers;

use Settings\Validation;
use Models\User;
use Models\WalletHistory;
class DebitController {
    public function __construct()
    {
        $check = new Validation;
        $data = $_POST['amount'];
        $amount = $check->checkInput($data);
        $username = $check->checkInput($_POST['username']);
        


        //check database
        $user = new User;
        $detail = $user->get(["username", "=", $username]);
        //print_r ($username); exit;

        if ( count($detail) > 0 ) {
            if ( $amount < 1 ) {
                echo "<script> alert('cannot process values lesser than 1'); window.location.replace('debit'); </script>";
            }
            //user is a registered user 
            //continue processing
            $oldAmount = $detail[0]['amount'];

            $newAmount = $oldAmount - $amount;
            if ($amount > $oldAmount) {
                echo "<script> alert('Insufficient Fund!!!'); window.location.replace('debit_user.php'); </script>";
                exit;
            }
            //update database
            $updated = $user->update(["amount", "=", $newAmount], ["username", "=", $detail[0]['username']]);
            
            if ( $updated ) {
                //add detail to wallet history
                $wallet = new WalletHistory;
                $remove = $wallet->create($detail[0]['username'], $amount, "₦$amount debitted by ADMIN", $newAmount );
                
                echo "<script> alert('₦$amount has been removed from $username\'s wallet '); window.location.replace('debit');</script>";
            } else {
                echo "<script> alert('$username wallet cannot be funded at the moment!!!'); window.location.replace('debit'); </script>";
            }

            

        } else {
            echo "<script> alert('$username is not registered'); window.location.replace('debit'); </script>";
        } 
    }
}