<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
		<a href="./audview.php?receiver=<?=$searchUserRow['id']?>">view chats</a>
	
	
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
    <a href="./audview.php?receiver=<?=$searchUserRow['id']?>">view chats</a>


    </div>
<?php }

?>
</div>
