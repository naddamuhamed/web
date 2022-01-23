<!DOCTYPE html>
<html lang="en">
<head>
  <title>BLogin page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
 <style>
  
  body {
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

      .container {
         background-color: #0ACF5A;
         padding: 20px;
         margin-top: 150px;
         border-radius: 20px;
     }


 
</style>
</head>
<body>
<?php
include "headerbeforelogin.php";
?>
<div class="container">

  <h2 style="text-align:center">Login</h2>
  <form action="loginsherif.php" method="post">
    <div class="textbox">
      <!-- <p ><b>Login Manually:<b></p> -->
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
    </div>
    <div class="password">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
    <!-- <div class="checkbox"> -->
      <!-- <label><input type="checkbox" name="remember"> Remember me</label> -->
    <!-- </div> -->
    <br>
    <!-- <div class="forgot password"> -->
      <!-- <a href="#" style="color:black">Forgot password?</a> -->
    <!-- </div> -->
    <br>

  
      <!-- <div class="button">
        
      </div> -->
      <div class="button">
      <button type="button" class="btn btn-danger" onclick="window.location.href='Registeration1.php'">Register</button>
      <button type="submit" name="submit" class="btn btn-success">Login</button>
 </div>

    
</form>
</div>

</body>
</html>