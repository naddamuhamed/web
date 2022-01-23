<?php

   $con=mysqli_connect('localhost','root','','hiking');
if(isset($_POST['submit']))
{

   $target_dir ="product-images/";
   
$target_file=$target_dir.basename($_FILES["photo"]["name"]);
// $uploadOk=i;
// echo $target_file;

// if (isset($_POST["submit"])){
// if ($_FILES["photo"]["size"]>10000000)
// echo "The File size is too large";
// echo "<br> The file type".$_FILES["photo"]["type"]."<br>";
// if ($_FILES["photo"]["type"]=="image/jpeg")
// echo "File accepted";
// else
// echo "File has to be a jpeg image";

$tmp_name = $_FILES["photo"]["tmp_name"];
	$name=basename($_FILES["photo"]["name"]);
	move_uploaded_file($tmp_name, "$target_dir/$name");


if(!$con)
   echo"error conneting to db";
      $sql="INSERT INTO items(name,code,photo,price,description)values('".$_POST['name']."','".$_POST['code']."','".$target_file."','".$_POST['price']."','".$_POST['description']."')";

      if($con->query($sql)===true)
         echo "record inserted";
      else{
         echo "Error:".$sql."<br>".$con->error;

      }
      $con->close();
} 

?>

<!DOCTYPE html>
<html>

<head>
   <title>Add Product</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <style type="text/css">
      
      body {
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

#ui {
         background-color: #0ACF5A;
         padding: 20px;
         margin-top: 200px;
         border-radius: 50px;
      }


      #ui label,
      h1 {
         color: white;
      }
      .container
      {
        margin-left: 500;
      }
   </style>
</head>

<body>
   <?php 
include "headeradmin.html";?>

   <div class="container">
      <div class="row">
         <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">Add Product</h1><br>
               <form class="form-group text-center" action="" method="post"  enctype="multipart/form-data" >
                  <!-- enctype='multipart/form-data' onsubmit='return validate(this)' -->
                  <div class="row">
                     <div class="col-lg-6 ">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter product name.."required>
                     </div>
                     <div class="col-lg-6">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter the price.."required>

                     </div>

                  </div>
                  <br>
            
                  <div class="row">
                     <div class="col-lg-6">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter the Description.."required>
                     </div>
                    
                        <div class="col-lg-6">
                       <label>Photo</label><br>
                  <input type="file" name="photo" required><br>
               </div>
                     
                  </div><br>

                  <div class="row">
                   <div class="col-lg-6">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Enter the code.."required>

                     </div>

                  </div>
                  <br>
         

                  <!-- <input type="submit" value="submit" name ="submit"> -->
                  <button type="submit" name="submit" class="button" value="submit" class="btn btn-primary">Submit</button>



               </form>
            </div>
         </div>
         <div class="col-lg-3"></div>
      </div>
   </div>
  
</body>

</html>