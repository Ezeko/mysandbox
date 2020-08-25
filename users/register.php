<?php

use Controllers\UserController;
use Settings\Token;

require_once("../config.php");

if (($_SERVER['REQUEST_METHOD']) === "POST") {
    $cont = new UserController;
    $messages = $cont->signup();

}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
    </head>
<body style="margin-left: 30em; margin-top: 4em; margin-right: 22em">
<form class="form-horizontal" action='' method="POST">
<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" required>
  <fieldset>
    <div id="legend">
      <legend class="text-center">Register</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="Username here"
        value="<?php if (isset($_POST['username'])){ echo $_POST['username']; } ''; ?>" class="input-xlarge" required>
        
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="Please provide your E-mail"
        class="input-xlarge" value="<?php if (isset($_POST['email'])){ echo $_POST['email']; } ''; ?>" required>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password"
        placeholder="Password should be at least 4 characters" class="input-xlarge" required>
        
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" required id="password_confirm" name="password_confirm" placeholder="Please confirm password" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Register</button>
        
      </div>
      <p class="text-center">Already Have an account? <a href="login" class="btn btn-primary">Log In Here</a></p>
    </div>
  </fieldset>
</form>
</body>
</html>