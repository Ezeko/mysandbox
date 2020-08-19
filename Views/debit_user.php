<?php

use Controllers\DebitController;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //check method of sending request
        require_once('../config.php');
        new DebitController;
    }
?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/credit.css">
<title> Debit User </title>


<div class="container">
	<div class="row">
        <h2>Debit User!</h2>
        <div class="col-md-3">
            <a href="credit_user.php"> Credit Users Here </a>
        </div>
        <div class="col-md-6">
            <a href="wallet_history.php"> Check Wallet history Here </a>
        </div>
    </div>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
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
        <input type="submit" value="Debit" class="btn-info form-control" >
    </div>
    </form>
</div>
    