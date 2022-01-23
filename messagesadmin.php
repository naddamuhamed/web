  <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<title>messages</title>
  	</html><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
	
u{
	text-decoration: none;
	border-bottom: 5px solid rosybrown;
}
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
         margin-bottom: 50px;
      }

</style>
<script>
    window.setInterval('refresh()', 10000);
    // Call a function every 10000 milliseconds 
    // (OR 10 seconds).

    // Refresh or reload page.
    function refresh() {
        window .location.reload();
    }
</script>
  </head>

  <body>
  	<?php session_start();
	  include"headeradmin2.html"; ?>
	  <div class="main">
 <div class="container">
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiking";

$conn = new mysqli($servername, $username, $password, $dbname);

// include "menu.php";
// $_SESSION['id']=3;
?>

<form class="form-inline" method = "POST" action = "">
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
		<?php
		if($searchUserRow['type']=='admin')
		echo"(admin)";
		?>
		<a href="./messageadmin.php?receiver=<?=$searchUserRow['id']?>">Send message</a>
	
	
		</div>
<?php }
}
?>
<div>
<?php
echo"<hr>history<hr>";
$lastMessage = "SELECT DISTINCT sent_by FROM messages WHERE received_by = ".$_SESSION['id']." ORDER BY createdAt desc";
// $lastMessage = "SELECT DISTINCT sent_by FROM messages WHERE received_by = '".$_SESSION['id']."' or (SELECT DISTINCT received_by FROM messages WHERE sent_by = '".$_SESSION['id']."')";
$x=[];
$i=0;
$lastMessageResult = mysqli_query($conn,$lastMessage) or die(mysqli_error($conn));
if(mysqli_num_rows($lastMessageResult) > 0) {
	while($lastMessageRow = mysqli_fetch_array($lastMessageResult)) {
		$sent_by = $lastMessageRow['sent_by'];
		$gf = "SELECT distinct status FROM messages WHERE sent_by = '$sent_by' and received_by = ".$_SESSION['id']." ORDER BY createdAt desc";
		$fd = mysqli_query($conn,$gf) or die(mysqli_error($conn));
		if(mysqli_num_rows($fd) > 0){
			$nhgbf = mysqli_fetch_array($fd);
				$status= $nhgbf['status'];
		}
		// mysqli_num_rows($fd);
	
		$x[$i]=$sent_by;
		$getSender = "SELECT * FROM person WHERE id = '$sent_by'";
		$getSenderResult = mysqli_query($conn,$getSender) or die(mysqli_error($conn));
		$getSenderRow = mysqli_fetch_array($getSenderResult);
		?>

		<div>
		<!-- <img src = "./images/<?=$getSenderRow['image']?>" class="img-circle" width = "40"/>  -->
		<?php
		if($status==1){
			?>
<u><b><?=$getSenderRow['firstname'];?></b></u>
<?php
		}
else{
	?>
	<i><?=$getSenderRow['firstname'];?></i>
<?php
}
		?>
		
		
		<?php
		if($getSenderRow['type']=='admin')
		echo"(admin)";
		?>
		<a href="./messageadmin.php?receiver=<?=$sent_by?>">Send message</a>
		</div><br>
<?php 
$i++;
}
} 
$lastMessage = "SELECT DISTINCT received_by FROM messages WHERE sent_by = ".$_SESSION['id'];
// $lastMessage = "SELECT DISTINCT sent_by FROM messages WHERE received_by = '".$_SESSION['id']."' or (SELECT DISTINCT received_by FROM messages WHERE sent_by = '".$_SESSION['id']."')";
// $i=0;
$f=false;
$lastMessageResult = mysqli_query($conn,$lastMessage) or die(mysqli_error($conn));
if(mysqli_num_rows($lastMessageResult) > 0) {
	while($lastMessageRow = mysqli_fetch_array($lastMessageResult)) {
		$received_by = $lastMessageRow['received_by'];
		$f=false;
		for($i=0;$i<sizeof($x);$i++){
			if($x[$i]==$received_by){
$f=true;
		}
		}
		if($f==true)
		continue;
		
		$getSender = "SELECT * FROM person WHERE id = '$received_by'";
		$getSenderResult = mysqli_query($conn,$getSender) or die(mysqli_error($conn));
		$getSenderRow = mysqli_fetch_array($getSenderResult);
		?>
		<div>
		<!-- <img src = "./images/<?=$getSenderRow['image']?>" class="img-circle" width = "40"/>  -->
		<i><?=$getSenderRow['firstname'];?></i>
		
		<?php
		if($getSenderRow['type']=='admin')
		echo"(admin)";
		?>
		<a href="./messageadmin.php?receiver=<?=$received_by?>">Send message</a>
		</div><br>
<?php }
}
else {
	echo "No conversations yet!";
}
?>
</div>
</div>
</div>
  </body>
  </html>