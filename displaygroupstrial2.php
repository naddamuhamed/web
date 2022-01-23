<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap 4 Bordered Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
.bs-example{
margin: 20px;
}
body {
  font-family: Arial;
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
table th
{
background-color:#037F28;
border: solid;
border-color: black;
color: black;
}
table td
{
background-color:#0ACF5A;
border: solid;
border-color: black;
color: black;
}

.button
{
   background-color: #F88306;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>
</head>
<body>
<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">
<h2 class="pull-left">group List</h2>
</div>
<?php
$con=mysqli_connect('localhost','root','','hiking');
if(!$con)
	echo"error conneting to db";
$result = mysqli_query($con,"SELECT * FROM groups");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class='table table-bordered table-striped'>
<tr>
<th>Name</th>	
<th>Location</th>
<th>Time from</th>
<th>Time to</th>
<th>Price</th>
<th>Id</th>
<th>Capacity</th>
<th>Delete</th>
<th>Edit</th>

</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["location"]; ?></td>
<td><?php echo $row["timeslotfrom"]; ?></td>
<td><?php echo $row["timeslotto"]; ?></td>
<td><?php echo $row["price"]; ?></td>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["capacity"]; ?></td>
<td>
<?php $_SESSION['ID'] = $row["id"]; ?>
   <button type="submit" class="button" value="Delete" onclick="window.location.href='deletegroups.php?id=<?=$row["id"]?>'" class="btn btn-primary">Delete</button>
</td>
<td>
  <button type="submit" class="button" value="Edit" onclick="window.location.href='Editdisplaygroups.php?id='<?=  $row["id"];?>" class="btn btn-primary">Edit</button>
</td>

</tr>
<?php
$i++;
}
?>
</table>
<?php
}
else{
echo "No result found";
}
?>
</div>
</div>        
</div>
</div>
</body>
</html>