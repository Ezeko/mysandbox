<?php

use Controllers\CreditController;

require_once ('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //check method of sending request
        
    new CreditController;
        
    }
?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/credit.css">
<title> Credit User</title>


<div class="container">
	<div class="row">
        <h2>Credit User!</h2>
        <div class="col-md-3">
        <a href="debit"> Debit Users Here </a>
    </div>
    <div class="col-md-6">
            <a href="history"> Check Wallet history Here </a>
        </div>
</div>

    <form method="POST" action="" >
    <div class="row form-group">
        <div> 
            <label for="amount"> AMOUNT</label>
        </div>
        <div class="input-group">
            <span class="input-group-addon primary"><span class="glyphicon glyphicon-star"></span></span>
            <input type="number" class="form-control" name="amount"
            placeholder="amount to be credited" required>
        </div>
    </div>
    <div class="row form-group">
        <div>
            <label for="username"> USERNAME</label>
        </div>
        <div class="input-group">
            <span class="input-group-addon info"><span class="glyphicon glyphicon-info-sign"></span></span>
            <input type="text" class="form-control" name="username"
            placeholder="username" required>
        </div>
    </div>
    <div>
        <input type="submit" value="Credit" class="btn-success form-control" >
    </div>
    </form>
</div>
    