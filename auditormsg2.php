<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>auditor msg</title>
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
         margin-top: 150px;
         border-radius: 30px;
         height: auto;
         height: auto;
         margin-bottom: 50px;
      }
      .form-inline
      {
      	margin-top: 20px;
      	text-align: center;
      }
      .button
     {
     	background-color: #F88306;
     }
     .chat
     {
     	margin-bottom: 30px;
     }

  </style>
</head>
<body>



  <?php

// session_start();
include"headeraud.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiking";

$conn = new mysqli($servername, $username, $password, $dbname);

// include "menu.php";
$_SESSION['id']=3;
?>
<div class="main">
<div class="container">
<form class="form-inline" method = "POST" action = "">
	<input type="text" name = "name" placeholder="Search" class="form-control">
	<input type="submit" value='Search' class="button" name='search' class="btn btn-default">
</form>
<?php
if(isset($_POST['search'])) {
	echo"search results<hr>";
	$search=$_POST['name'];
	if($search=='admin'){
		$searchUser = "SELECT * FROM person WHERE type = 'admin'";
		
	}
	else{
		$searchUser = "SELECT * FROM person WHERE firstname = '$search' and type='admin'";
	}
	$searchUserResult = mysqli_query($conn,$searchUser);

	while($searchUserRow = mysqli_fetch_array($searchUserResult)){	?>
		<div>
		<!-- <img src = "images/<?=$searchUserRow['image']?>" class="img-circle" width = "40"/> -->
		<?=$searchUserRow['firstname']?>
		<?php
		if($searchUserRow['type']=='admin')
		echo"(admin)";
		?>
		<div class="chat">
		<a  href="./audview2.php?receiver=<?=$searchUserRow['id']?>">view chats</a>
	
	    </div>
		</div>
<?php }
}
?>
<div>
<?php
echo"<hr>admins<hr>";
// if($search=='admin'){
    $searchUser = "SELECT * FROM person WHERE type = 'admin'";
    
// }
// else{
    // $searchUser = "SELECT * FROM person WHERE firstname = '$search'";
// }
$searchUserResult = mysqli_query($conn,$searchUser);

while($searchUserRow = mysqli_fetch_array($searchUserResult)){	?>
    <div>
    <!-- <img src = "images/<?=$searchUserRow['image']?>" class="img-circle" width = "40"/> -->
    <?=$searchUserRow['firstname']?>
	<?php
		if($searchUserRow['type']=='admin')
		echo"(admin)";
		?>
    <a href="./audview2.php?receiver=<?=$searchUserRow['id']?>">view chats</a>


    </div>
<?php }

?>
</div>
</div>
</div>
</body>
</html>