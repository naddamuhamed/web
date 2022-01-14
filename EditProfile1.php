<?php
$con=mysqli_connect('localhost','root','','hiking');
$query="SELECT * FROM hiker WHERE id=4";
$result = mysqli_query($con,$query);
while ($row= mysqli_fetch_array($result))
            {

                $fname     = $row['firstname'];
                $lname     = $row['lastname'];
                $email = $row['email'];
                $pwd = $row['pwd'];
                $address = $row['address'];
                 $mobile = $row['mobile'];
                  $age = $row['age'];
            }
?>
<html>
<head>
	<title>Edit Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
#ui {
         background-color: darkslategrey;
         padding: 20px;
         margin-top: 60px;
         border-radius: 50px;
      }

      #ui label,
      h1 {
         color: white;
      }
<?php
if(isset($_SESSION['update'])){
echo "<h4>".$_SESSION['update']."</h4>";
unset($_SESSION['update']);
}
?>

</style>
</head>


<body>
	<div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">Edit hiker profile</h1><br>
               <form class="form-group text-center" action="" method="post"  >
                  <!-- enctype='multipart/form-data' onsubmit='return validate(this)' -->
                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>First name</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" onfocus="this.value=''" id="1" value="<?php echo $fname ?>">
                           <br>

                     </div>
                    
                    <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('1').value = ''"> 
                       </input>
                   </div>

                  </div>
                  <br>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Last name</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" onfocus="this.value=''" id="2" value="<?php echo $lname ?>">
                           <br>

                     </div>
                   
                   <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('2').value = ''"> 
                       </input>
                   </div>

                  </div>
                  <br>
            
                  <div class="row">
                     <div class="col-lg-3">
                        <label>Email</label>
                    </div>
                     <div class="col-lg-3">
                        <input type="text" onfocus="this.value=''" id="3" value="<?php echo $email ?>">
                           <br>
                     </div>

                     <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('3').value = ''"> 
                       </input>
                   </div>
                 </div>
                 <br>

                     <div class="row">
                     <div class="col-lg-3 ">
                        <label>Password</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="password" onfocus="this.value=''" id="4" value="<?php echo $pwd ?>">
                           <br>

                     </div>
                    
                    <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('4').value = ''"> 
                       </input>
                   </div>
                  </div>
                  <br>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Confirm password</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="password" onfocus="this.value=''" id="5" value="<?php echo $pwd ?>">
                           <br>

                     </div>
                    
                    <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('5').value = ''"> 
                       </input>
                   </div>
                  </div>
                  <br>


                       <div class="row">
                     <div class="col-lg-3 ">
                        <label>Address</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" onfocus="this.value=''" id="6" value="<?php echo $address ?>">
                           <br>

                     </div>
                     <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('6').value = ''"> 
                       </input>
                   </div>
                  </div>
                  <br>

                     <div class="row">
                     <div class="col-lg-3 ">
                        <label>Mobile</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" onfocus="this.value=''" id="7" value="<?php echo $mobile ?>">
                   </div>
                   <div class="col-lg-6">
                       <input type="button" name="" value="clear" onclick="document.getElementById('7').value = ''"> 
                       </input>
                   </div>
                           <br>
                     

                  </div>
                  <br>
                      
                    <div class="row">
                     <div class="col-lg-3 ">
                        <label>Age</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="number" onfocus="this.value=''" id="8" value="<?php echo $age ?>">
                           <br>

                     </div>
                     <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('8').value = ''"> 
                       </input>
                   </div>
                  </div>
                  <br>

                  <!-- <input type="submit" value="submit" name ="submit"> -->
                  <button type="submit"  value="Update" class="btn btn-primary">Update</button>



               </form>
            </div>
         </div>
      </div>
   </div>

</body>
</html>