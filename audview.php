<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div>
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
		<a href="./messageaud.php?receiver=<?=$sent_by?>&user=<?=$receiver?>">view chat</a>
		</div><br>
<?php }
} 
else {
	echo "No conversations yet!";
}
?>
</div>
