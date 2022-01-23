<!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<title>message</title>
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
         border-radius: 30px;
         height: auto;     
         margin-bottom: 50x;
         width: 500px;
      }
.button
{
	background-color: #F88306;
}
</style>

  </head>

  <body>
  	<?php 
	  session_start();
	  include"headeradmin2.html"; ?>
	  <div class="main">
 <div class="container">

<?php

// session start


// include DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$receiver = $_GET['receiver'];
// include "menu.php";

$getReceiver = "SELECT * FROM person WHERE id = '$receiver'";
$getReceiverResult = mysqli_query($conn,$getReceiver) or die(mysqli_error($conn));
$getReceiverRow = mysqli_fetch_array($getReceiverResult);
if(isset($_POST['submit'])) {
	$createdAt = date("Y-m-d h:i:sa");
	$sent_by = $_POST['sent_by'];
	$receiver = $_POST['received_by'];
	$message = $_POST['message'];
	$sendMessage = "INSERT INTO messages(sent_by,received_by,message,createdAt,status) VALUES('$sent_by','$receiver','$message','$createdAt','1')";
	mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));
}
?>
<!-- <img src="./images/<?=$getReceiverRow['image']?>" class="img-circle" width = "40"/> -->
<strong><?=$getReceiverRow['firstname']?></strong>
<table class="table">
<?php
$getMessage = "SELECT  messages.* ,person.firstname FROM messages INNER JOIN person on sent_by=person.id  WHERE sent_by = '$receiver' AND received_by = ".$_SESSION['id']." OR sent_by = ".$_SESSION['id']." AND received_by = '$receiver' ORDER BY createdAt asc";
// $getMessage = "SELECT  messages.* ,person.firstname, case, when messages.sent_by= '".$_SESSION['id']."' when messages.received_by='".$_SESSION['id']."' end as rs FROM messages INNER JOIN person on sent_by=person.id  WHERE sent_by = '$receiver' AND received_by = ".$_SESSION['id']." OR sent_by = ".$_SESSION['id']." AND received_by = '$receiver' ORDER BY createdAt asc";

$getMessageResult = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));
if(mysqli_num_rows($getMessageResult) > 0) {
	while($getMessageRow = mysqli_fetch_array($getMessageResult)) {	?>
	<tr><div style = "margin: 10;">
	<td>	<h4 style = "color: #007bff;display:inline"><?=$getMessageRow['firstname']?></h4></td>
	<td>	<p class="text-center" style = "display:inline"><?=$getMessageRow['message']?></p></td>
	<?php
	$qu="UPDATE messages set status='0' where sent_by = '$receiver' AND received_by = ".$_SESSION['id']." ";
	$f = mysqli_query($conn,$qu) or die(mysqli_error($conn));

	?>
		</div>
		</tr>
<?php } 
} 
else { 
	echo "<tr><td><p>No messages yet! Say 'Hi'</p></td></tr>";
}
?>
</table>
<form class="form-inline" action="" method = "POST">
	<input type="hidden" name = "sent_by" value = "<?=$_SESSION['id']?>"/>
	<input type="hidden" name = "received_by" value = "<?=$receiver?>"/>
	<input type="text" name = "message" class="form-control" placeholder = "Type your message here" required/>
	 <button type="submit" class="button" name='submit' value="send">Send</button>
</form>
</div>
</div>
</body>
</html>

