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
<h2 class="pull-left">products List</h2>
</div>
<?php
$con=mysqli_connect('localhost','root','','hiking');
if(!$con)
   echo"error conneting to db";
$result = mysqli_query($con,"SELECT * FROM hiker");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class='table table-bordered table-striped'>
<tr>
<th>First Name</th>  
<th>Last Name</th>
<th>Password</th>
<th>ID</th>
<th>Photo</th>
<th>Email</th>
<th>Address</th>
<th>Mobile</th>
<th>Gender</th>
<th>Age</th>
<th>Type</th>

</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["lastname"]; ?></td>
<td><?php echo $row["pwd"]; ?></td>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["photo"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["address"]; ?></td>
<td><?php echo $row["mobile"]; ?></td>
<td><?php echo $row["gender"]; ?></td>
<td><?php echo $row["age"]; ?></td>
<td><?php echo $row["type"]; ?></td>

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