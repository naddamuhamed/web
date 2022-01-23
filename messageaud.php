<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php

// session start
session_start();

// include DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['submit'])){
	$query="UPDATE messages SET comment='".$_POST['comment']."' where id='".$_POST['msgid']."'";
	$getMessageResult = mysqli_query($conn,$query) or die(mysqli_error($conn));
	// echo $query;
	
}
$receiver = $_GET['receiver'];
$sent_by=$_GET['user'];
// include "menu.php";

// $getReceiver = "SELECT * FROM person WHERE id = '$receiver'";
// $getReceiverResult = mysqli_query($conn,$getReceiver) or die(mysqli_error($conn));
// $getReceiverRow = mysqli_fetch_array($getReceiverResult);
// if(isset($_POST['submit'])) {
// 	$createdAt = date("Y-m-d h:i:sa");
// 	$sent_by = $_POST['sent_by'];
// 	$receiver = $_POST['received_by'];
// 	$message = $_POST['message'];
// 	$sendMessage = "INSERT INTO messages(sent_by,received_by,message,createdAt) VALUES('$sent_by','$receiver','$message','$createdAt')";
// 	mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));
// }
?>
<!-- <img src="./images/<?=$getReceiverRow['image']?>" class="img-circle" width = "40"/> -->
<!-- <strong><?=$getReceiverRow['firstname']?></strong> -->
<table class="table ">
<?php
$getMessage = "SELECT  messages.* ,person.firstname FROM messages INNER JOIN person on sent_by=person.id  WHERE sent_by = '$receiver' AND received_by = '$sent_by' OR sent_by = '$sent_by' AND received_by = '$receiver' ORDER BY createdAt asc";
$getMessageResult = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));
if(mysqli_num_rows($getMessageResult) > 0) {
	while($getMessageRow = mysqli_fetch_array($getMessageResult)) {	?>
	<tr><div style = "margin: 10;">
	<td>	<h4 style = "color: #007bff;display:inline"><?=$getMessageRow['firstname']?></h4>
		<p class="text-center" style = "display:inline"><?=$getMessageRow['message']?></p></td>
	<!-- <td><p>add comment</p></td> -->
		</div>
		</tr>
		<td>	<p class="text-center" style = "display:inline"><?=$getMessageRow['comment']?></p></td>
		<form class="form-inline" action="" method = "POST">
		<tr><td><input type="text" name="comment" id="" placeholder="add comment">
		<input type="hidden" name="msgid" value="<?=$getMessageRow['id']?>">
	<button type="submit" name="submit">submit</button>
	</form>
	</td>
	
	</tr>

<?php } 
} 
else { 
	echo "<tr><td><p>No messages yet! Say 'Hi'</p></td></tr>";
}


?>
</table>
<!-- <form class="form-inline" action="" method = "POST">
	<input type="hidden" name = "sent_by" value = "<?=$sent_by?>"/>
	<input type="hidden" name = "received_by" value = "<?=$receiver?>"/>
	<input type="text" name = "message" class="form-control" placeholder = "Type your message here" required/> -->
	<!-- <input type = "submit" value='send' name='submit' class="btn btn-default">
</form> -->

