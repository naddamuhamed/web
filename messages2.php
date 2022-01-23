<<!DOCTYPE html>
<head>
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
         margin-top: 200px;
         border-radius: 50px;
         width: 400px;
         height: auto;
      }

h1
{
	text-align: center;
}
</style>


</head>



<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiking";

$conn = new mysqli($servername, $username, $password, $dbname);

// include "menu.php";
$_SESSION['id']=3;
?>
<body>
	<?php include "header.php"; ?>
	<div class="container">
<form class="form-inline" method = "POST" action = "">
	
		<h1><b>Send message</b></h1>

	<input type="text" name = "name" placeholder="Search" class="form-control">
	<input type="submit" value='Search' name='search' class="btn btn-default">
</form>
<?php
if(isset($_POST['search'])) {
	echo"search results<hr>";
	$search=$_POST['name'];
	if($search=='admin'){
		$searchUser = "SELECT * FROM person WHERE type = 'admin'";
		
	}
	else{
		$searchUser = "SELECT * FROM person WHERE firstname = '$search'";
	}
	$searchUserResult = mysqli_query($conn,$searchUser);

	while($searchUserRow = mysqli_fetch_array($searchUserResult)){	?>
		<div>
		<!-- <img src = "images/<?=$searchUserRow['image']?>" class="img-circle" width = "40"/> -->
		<?=$searchUserRow['firstname']?>
		<a href="./message.php?receiver=<?=$searchUserRow['id']?>">Send message</a>
	
	
		</div>
<?php }
}
?>
<div>
<?php
echo"<hr>history<hr>";
$lastMessage = "SELECT DISTINCT sent_by FROM messages WHERE received_by = ".$_SESSION['id'];
$lastMessageResult = mysqli_query($conn,$lastMessage) or die(mysqli_error($conn));
if(mysqli_num_rows($lastMessageResult) > 0) {
	while($lastMessageRow = mysqli_fetch_array($lastMessageResult)) {
		$sent_by = $lastMessageRow['sent_by'];
		$getSender = "SELECT * FROM person WHERE id = '$sent_by'";
		$getSenderResult = mysqli_query($conn,$getSender) or die(mysqli_error($conn));
		$getSenderRow = mysqli_fetch_array($getSenderResult);
		?>
		<div>
		<!-- <img src = "./images/<?=$getSenderRow['image']?>" class="img-circle" width = "40"/>  -->
		<?=$getSenderRow['firstname'];?>
		<a href="./message.php?receiver=<?=$sent_by?>">Send message</a>
		</div><br>
<?php }
} 
else {
	echo "No conversations yet!";
}
?>
</div>
</div>
</body>
</html>