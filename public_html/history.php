<?php

use Controllers\WalletController;

require_once( '../config.php');
    //check server method

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $history = new WalletController;
    
    $details = $history->checkHistory();
        

}
?>

<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/credit.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" > </script>

<title>Wallet History </title>


<div class="container">
	<div class="row">
        <h2>Wallet History</h2>
        <div class="col-md-3">
            <a href="credit"> Credit Users Here </a>
        </div>
        <div class="col-md-6">
            <a href="debit"> Debit Users Here </a>
        </div>
    </div>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
    
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
        <input type="submit" value="Check Wallet History" class="btn-info form-control" >
    </div>
    </form>

    <div class="pt-5">
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
            <tr>
                <th> S/N </th>
                <th>Username</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Balance</th>
                <th>Time</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
              if (isset($details)){
                  $count = 0;

                  foreach ( $details as $history){
                    echo ("
                    <tr>
                    <td>". ++$count . "</td>
                    <td>". $history['username'] . "</td>
                    <td> ₦" . ($history['amount']) . "</td>
                    <td>". $history['description']. "</td>
                    <td>₦". $history['balance'] . "</td>
                    <td>" . $history['time']. "</td>
                    </tr>
                
                    ");

                    
                  }
              }
            ?>         
        </tbody>
        
    </table>
    </div>
</div>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>