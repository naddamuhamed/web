<?php

   $con=mysqli_connect('localhost','root','','hiking');
if(isset($_POST['submit']))
{
   $target_dir ="uploads/";
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
   // }
   
   
   $ciphering = "AES-128-CTR";
   
   // Use OpenSSl Encryption method
   $iv_length = openssl_cipher_iv_length($ciphering);
   $options = 0;
   
   // Non-NULL Initialization Vector for encryption
   $encryption_iv = '1234567891011121';
   
   // Store the encryption key
   $encryption_key = "GeeksforGeeks";
   
   // Use openssl_encrypt() function to encrypt the data
   $encryption = openssl_encrypt($_POST['pwd'], $ciphering,
            $encryption_key, $options, $encryption_iv);





if(!$con)
   // echo"error conneting to db";
   header("Location:errorpage.php"); 
      $sql="INSERT INTO person(firstname,lastname,pwd,photo,email,address,mobile,gender,age,type,ssn,salary) values('".$_POST['fname']."','".$_POST['lname']."','".$encryption."','".$target_file."','".$_POST['email']."','".$_POST['address']."','".$_POST['mobile']."','".$_POST['gender']."','".$_POST['age']."','".$_POST['type']."','".$_POST['ssn']."','".$_POST['salary']."')";
      if($con->query($sql)===true){
         // echo "record inserted";
         ?>
         <script>
          alert("Your data has been added..");
          </script>

         <!-- <div class="alert alert-success" role="alert">
         <strong></strong>your data have been added. -->
         <?php
        
      }

         
      else{
         // echo "Error:".$sql."<br>".$con->error;
         header("Location:errorpage.php"); 

      }
      $con->close();
} 

?>

<!DOCTYPE html>
<html>

<head>
   <title>Add Employee</title>
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
   </style>
</head>

<body>
  <?php
include "headeradmin.html";
?>
   <div class="container">
      <div class="row">
         <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">Add Employee</h1><br>
               <form class="form-group text-center" action="" method="post" enctype="multipart/form-data" >
                  <!-- enctype='multipart/form-data' onsubmit='return validate(this)' -->
                  <div class="row">
                     <div class="col-lg-6 ">
                        <label>First Name:</label>
                        <input type="text" name="fname" class="form-control" placeholder="Enter employee's first name.." pattern="[A-Za-z]{4,}" title="Only characters allowed, starting from 4 characters" required>
                     </div>
                     <div class="col-lg-6">
                        <label>Last Name:</label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter employee's last name.." pattern="[A-Za-z]{4,}" title="Only characters allowed, starting from 4 characters" required>

                     </div>

                  </div>
                  <br>
            
                  <div class="row">
                     <div class="col-lg-6">
                        <label>Password:</label>
                        <input type="Password" name="pwd" class="form-control" placeholder="Enter employee's password.." pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$" title="Must contain at least one number, one uppercase letter, one lowercase letter, and one special character '!@#$%^&*_=+-', and at least 8 or more characters" required>
                     </div>
                     <div class="col-lg-6">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter employee's email.."required>
                       <br>
                       </div>
                       <div class="col-lg-6">
                        <label>Age:</label>
                        <input type="text" name="age" class="form-control" placeholder="Enter employee's age.." pattern="[12][0-9]|3[01]{1,2}" title="Enter valid age from 10 to 31" required>
                        <br>
                     </div>
                  
                       <div class="col-lg-6">
                       <label>Address:</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter employee's Address.." pattern="^(?=.*[a-z])(?=.*[0-9])+$" title="alphanumeric characters" required>
                     <br>
                     </div>
                     <div class="col-lg-6">
                        <label>Mobile:</label>
                        <input type="text" name="mobile" class="form-control" placeholder="Enter employee's mobile number.." pattern="[0-9]{11}" title="Mobile number must be 11 numbers long" required>
                       <br>
                       </div>
                      
                     <div class="col-lg-6">
                        <!-- <br> -->
                        <label>Type:</label>
                        <br>
                        <select name="type" id="type">
<!-- <br> -->
                        <option value="admin">Admin</option>
                        <option value="hr">HR</option>
                        <option value="auditor">Auditor</option>
                        </select>
                        <!-- <input type="text" name="type" class="form-control" placeholder="Enter employee's type.."required> -->
                       <br><br><br>
                       </div>
                       <div class="col-lg-6">
                        <label>SSN:</label>
                        <input type="number" name="ssn" class="form-control" placeholder="Enter employee's SSN.." required>
                     </div>
                     <div class="col-lg-6">
                        <label>Salary:</label>
                        <input type="number" name="salary" class="form-control" placeholder="Enter employee's salary.." required>
                       <br>
                       </div>
                        <div class="col-lg-6">
                        <label>Photo:</label><br>
                  <input type="file" name="photo" required><br>
                     
                         </div>
                        <br>
                        <div class="col-lg-6">
                     <label> Gender:</label><br>
                  <input type="radio" name="gender" value="male" required> <b>Male</b>
                  <input type="radio" name="gender" value="female" required> <b>Female</b>
                  <input type="radio" name="gender" value="others" required> <b>Others</b></br></br>
               </div>
               <br>
               
                  </div><br>
                  
                  
         

                  <!-- <input type="submit" value="submit" name ="submit"> -->
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Add</button>



               </form>
            </div>
         </div>
         <div class="col-lg-3"></div>
      </div>
   </div>
  
</body>

</html>