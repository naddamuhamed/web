<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>audview</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
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
         width: auto;    
         margin-bottom: 50x;
      }
      </style>
<body>


<?php include"headeraud.html"; ?>
<div class="main">
<div class="container">
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiking";

$conn = new mysqli($servername, $username, $password, $dbname);
echo"<hr>users they chatted with<hr>";
$receiver = $_GET['receiver'];
$lastMessage = "SELECT DISTINCT sent_by FROM messages WHERE received_by = ".$receiver;
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
		<a href="./messageaud2.php?receiver=<?=$sent_by?>&user=<?=$receiver?>">view chat</a>
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
