<?php
session_start();
$con=mysqli_connect('localhost','root','','hiking');
$query="SELECT * FROM person WHERE id=".$_SESSION['id'];
$result = mysqli_query($con,$query);
while ($row= mysqli_fetch_array($result))
            {

                $fname     = $row['firstname'];
                $lname     = $row['lastname'];
                $email = $row['email'];
                $address = $row['address'];
                 $mobile = $row['mobile'];
                  $age = $row['age'];
                   $photo = $row['photo'];
            }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>View profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
.image1{
  box-sizing: border-box;
  width: 149px;
  height: 149px;
  margin: 20px;
  border: 5px solid #0082e6;
  padding: 3px;
  background-color: white;
}
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
      .x {
  border: 3px solid #0082e6;
  padding: 1px 3px 3px 1px;
    margin-right: 200px;
  margin-left: 200px;
  background-color: lightgrey;
}

.y {
  border: 3px solid #0082e6;
  padding: 1px 3px 3px 1px;
    margin-right: 100px;
  margin-left: 200px;
  background-color: lightgrey;
}
  </style>
</head>
<body>
   <?php
   include "header.php";
   ?>
	<div class="container">
      <div class="row">
         <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">Hiker's profile</h1>
               <form class="form-group text-center" action="" method="post">


<div  id="profile-container">
   <image class="image1" id="profileImage" name="photo" src="<?php echo $photo ?>">
</div>
<br>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>First name:</label>
                       
                     </div>

                       <div class="x">
                            <?php echo $fname ?>
                        </div>
                           <br>
                   </div>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Last name:</label>
                       
                     </div>

                     
                       <div class="x">
                            <?php echo $lname ?>
                        </div>
                           <br>

                  </div>
            
                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Email:</label>
                       
                     </div>

                     
                       <div class="y">
                            <?php echo $email ?>
                        </div>
                           <br>
                   </div>
                     <div class="row">
                      <div class="col-lg-3 ">
                        <label>Address:</label>
                       
                     </div>

                       <div class="y">
                            <?php echo $address ?>
                        </div>
                           <br>
                    </div>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Mobile:</label>
                       
                     </div>

                       <div class="x">
                            <?php echo $mobile ?>
                        </div>
                           <br>
                    </div>
                   
                       <div class="row">
                     <div class="col-lg-3 ">
                        <label>Age:</label>
                       
                     </div>

                       <div class="x">
                            <?php echo $age ?>
                        </div>
                           <br>
                     <div class="col-lg-3 ">
                        <label>Group:</label>
                       
                     </div>

                       <div class="x">
                            <?php echo "to be done" ?>
                        </div>
                           <br>
                   </div>
                    



               </form>
            </div>
         </div>
      </div>
   </div>

</body>
</html>