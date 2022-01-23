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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">


body {
  font-family: Arial;
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

* {
  box-sizing: border-box;
}


form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button {
  background: #F88306;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
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


  .searchbutton
      {
        background-color:#F88306;

      }
      mark {
  background-color: #F88306;
  color: black;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>
</head>
<body>
    <?php include "headeradmin.html"; ?>
     <div class="main">
    <div class="container">
      <div class="row">
         
<!-- <div class="col-lg-6">


        <form  class="example" action="#" >
            <div class="row">
            <div class="col-lg-3">
                <br>

        <input   type="text" name="txt" id="txt">
    </div>
    <div class="col-lg-12">
        <button  type="submit">Search</button>
        <p id="pgh"></p>
    </div>
</div>
</form> -->
            <div class="col-lg-11 ">                   
                  <form class="form-group text-center"  style="margin:auto;max-width:300px" >                         
                     <input type="text" placeholder="Search.." name="txt"  id="txt">
                     <button type="submit" name = "search_button" class="searchbutton" value = "search_button"><i class="fa fa-search"></i></button>
                     <p id="pgh"></p>
                  </form>                                
               </div>
            
        <?php
        $con=mysqli_connect('localhost','root','','hiking');
        if(isset($_GET['txt'])){
            ?>
           
            <?php
            $values = $_GET['txt'];
            $query = "SELECT * FROM person WHERE CONCAT(firstname) Like (('%$values%')) and type='admin' ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){
                ?>

                 <table border="1">
    
        <thead>
<th>First Name</th>  
<th>Last Name</th>
<!-- <th>Password</th> -->
<th>ID</th>
<!-- <th>Photo</th> -->
<th>Email</th>
<!-- <th>Address</th> -->
<th>Mobile</th>
<th>Gender</th>
<th>Age</th>
<th>Type</th>
<!-- <th>SSN</th> -->
<th>Salary</th>
<th>Delete</th>


        </thead>
        <?php
                foreach($result as $row){
                    
                  
                    ?>
            <tr>
           <td><?php echo $row['firstname'];?></td>
            <td><?php echo $row['lastname'];?></td>
            <!-- <td><?php echo $row['pwd'];?></td> -->
            <td><?php echo $row['id'];?></td>
            <!-- <td><?php echo $row['photo'];?></td> -->
            <td><?php echo $row['email'];?></td>
            <!-- <td><?php echo $row['address'];?></td> -->
            <td><?php echo $row['mobile'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['age'];?></td>
            <td><?php echo $row['type'];?></td>
            <!-- <td><?php echo $row['ssn'];?></td> -->
            <td><?php echo $row['salary'];?></td>
            <td>
 <button type="submit" class="button" value="Delete" onclick="window.location.href='deleteemp.php?id=<?=$row["id"]?>'" class="btn btn-primary">Delete</button>
</td>
            </tr>
        
            
      

         <?php
                }
                ?>
                  </table>
                  </div>
                 
                   </div>
<?php
            
        }
        


else{
    ?>
<h3><?php echo "No result found";?></h3>
<?php
}

            }
                ?>
        
        
   




<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-3">
<div class="page-header clearfix">
   
<h2 class="pull-left"><mark>Employee's List</mark></h2>
<br><br>

<?php
$con=mysqli_connect('localhost','root','','hiking');
if(!$con)
   echo"error conneting to db";
$result = mysqli_query($con,"SELECT * FROM person where type='admin'");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class='table table-bordered table-striped'>
<tr>
<th>First Name</th>  
<th>Last Name</th>
<!-- <th>Password</th> -->
<th>Email</th>
<th>Age</th>
<th>Gender</th>
<th>ID</th>
<th>Mobile</th>
<!-- <th>Photo</th> -->
<th>Type</th>
<!-- <th>SSN</th> -->
<!-- <th>Address</th> -->
<th>Salary</th>
<!-- <th>Edit</th> -->
<th>Delete</th>

</tr>
<?php
$i=0;

while($row = mysqli_fetch_array($result)) {
?>
<tr>

             <td><?php echo $row['firstname'];?></td>
            <td><?php echo $row['lastname'];?></td>
            <!-- <td><?php echo $row['pwd'];?></td> -->
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['age'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['mobile'];?></td>
            <!-- <td><?php echo $row['photo'];?></td> -->
            <td><?php echo $row['type'];?></td>
            <!-- <td><?php echo $row['ssn'];?></td> -->
            <!-- <td><?php echo $row['address'];?></td> -->
            <td><?php echo $row['salary'];?></td>
<!-- <td>
 <button type="submit" class="button" value="edit" onclick="window.location.href='editEmployee.php?id=<?=$row["id"]?>'" class="btn btn-primary">Edit</button>
</td> -->

<td>
 <button type="submit" class="button" value="Delete" onclick="window.location.href='deleteemp.php?id=<?=$row["id"]?>'" class="btn btn-primary">Delete</button>
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
    ?>
<h3><?php echo "No result found";?></h3>
<?php
}
?>
</div>
</div>        
</div>
</div>
</div>
 </div>
      
</div>
</body>
</html>