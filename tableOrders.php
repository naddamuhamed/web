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

  .searchbutton
      {
        background-color:#F88306;
      }
      .col-lg-11
      {
        margin-top: 80px;
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
</form>
       -->    
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
            <table border="1">
        <thead>
<th>Product name</th>  
<th>Product Quantity</th>
<th>Price</th>
<th>Hiker name</th>
<th>Total Amount</th> 
        </thead>
            <?php
            $values = $_GET['txt'];
            $query = "SELECT * FROM orders WHERE (pquantity like (('$values'))) OR (hname like (('$values'))) OR (pprice like (('$values'))) OR (totalamount like (('$values'))) OR (pname like (('%$values%'))) ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){
                foreach($result as $row){
                    
                  
                    ?>
            <tr>
<td><?php echo $row["pname"]; ?></td>
<td><?php echo $row["pquantity"]; ?></td>
<td><?php echo $row["pprice"]; ?></td>
<td><?php echo $row["hname"]; ?></td>
<td><?php echo $row["totalamount"]; ?></td>

            </tr>
        
            
      

         <?php
                }
                ?>
                  </table>
                  </div>
            
                   </div>
<?php
            
        }
        
            }
                ?>



   
<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-3">
<div class="page-header clearfix">
<h2 class="pull-left"><mark>orders List</mark></h2>
<br><br>
</div>
<?php
$con=mysqli_connect('localhost','root','','hiking');
if(!$con)
   echo"error conneting to db";
$result = mysqli_query($con,"SELECT * FROM orders");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class='table table-bordered table-striped'>
<tr>
<th>Product name</th>  
<th>Product Quantity</th>
<th>Price</th>
<th>Hiker name</th>
<th>Total Amount</th> 

</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["pname"]; ?></td>
<td><?php echo $row["pquantity"]; ?></td>
<td><?php echo $row["pprice"]; ?></td>
<td><?php echo $row["hname"]; ?></td>
<td><?php echo $row["totalamount"]; ?></td>


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
</div>
 </div>
      
</div>
</body>
</html>