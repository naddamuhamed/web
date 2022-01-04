<?php
$nameErr="";

// if(isset($_POST['submit'])){ 
//    if (isset($_POST['lname'])){             
//       $lname=$_POST['lname'];
//       if (!preg_match("/^[a-zA-Z ]*$/",$lname) ){  
//           $nameErr = "Only alphabets and white space are allowed";  
//          //  echo $nameErr ;
//       }  
      
//       }
//    }
   //check if form was submitted
	// if(empty($_POST['Email']))
	// {
	// 	$emailError="Email is required";
	// }
	// else
	// {
	// 	$sql="insert into user(Name,Email,Password,Address) values('".$_POST['Name']."','".$_POST["Email"]."','".$_POST["Password"]."','".$_POST["Address"]."')";
	// 	echo $sql;
	// 	$result=mysqli_query($conn,$sql);
	// 	if($result)	
	// 	{
	// 		header("Location:home.php");
	// 	}
	// }


?>
<!DOCTYPE html>
<html>

<head>
   <title>Registration</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <style type="text/css">
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
   </style>
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">REGISTRATION FORM</h1><br>
               <form class="form-group text-center" action="db.php" method="post" >
                  <!--  enctype='multipart/form-data' onsubmit='return validate(this)' -->
                  <div class="row">
                     <div class="col-lg-6 ">
                        <label>First Name:</label>
                        <input type="text" name="fname" class="form-control" placeholder="Enter your First name.." pattern="[A-Za-z]{4,}" title="Only characters allowed, starting from 4 characters"  required>
                     </div>
                     <div class="col-lg-6">
                        <label>Last Name:</label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter your Last name.." pattern="[A-Za-z]{4,}" title="Only characters allowed, starting from 4 characters" required> 

                     </div>

                  </div>
                  <br>
                  <label>E-mail:</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter your E-mail.."><br>
                  <div class="row">
                     <div class="col-lg-6">
                        <label>Password:</label>
                        <input type="password" name="pwd" class="form-control" placeholder="Enter New Password.." pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$" title="Must contain at least one number, one uppercase letter, one lowercase letter, and one special character '!@#$%^&*_=+-', and at least 8 or more characters" id="Password" required>
                     </div>
                     <div class="col-lg-6">
                        <label>Re-type Password:</label>
                        <input type="password" name="conpwd" class="form-control" placeholder="Re-type again.." id="ConfirmPassword" required>                    
                        <script >
    function Validate() {
        var password = document.getElementById("Password").value;
        var confirmPassword = document.getElementById("ConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
       
</script>
                     </div>
                  </div><br>
                  <div class="row">
                     <div class="col-lg-6">
                        <label>MobileNumber:</label>
                        <input type="text" name="phoneNumber" class="form-control"
                           placeholder="Enter your MobileNumber.." pattern="[0-9]{11}" title="Mobile number must be 11 numbers long" required><br>

                     </div>
                     <div class="col-lg-6">
                        <label>Age:</label>
                        <input type="text" name="age" class="form-control" placeholder="Enter your Age.." pattern="[12][0-9]|3[01]{1,2}" title="Enter valid age from 10 to 31" required><br>

                     </div>
                  </div>
                  <label>Address:</label>
                  <input type="text" name="address" class="form-control" placeholder="Enter your Address.." pattern="^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9]+$" required title="alphanumeric characters" required><br>
                  <label> Gender:</label><br>
                  <input type="radio" name="gender" value="male" required> <b>Male</b>
                  <input type="radio" name="gender" value="female" required> <b>Female</b>
                  <input type="radio" name="gender" value="others" required> <b>Others</b></br></br>
                  <label>Photo:</label><br>
                  <input type="file" name="photo"><br><br>


                  <input type="submit" value="submit" name ="submit" onclick="Validate()">
                  <!-- <button type="submit"  value="submit" class="btn btn-primary">Submit</button> -->
                  <!-- <button type="button"  value="submit" class="btn btn-primary">Submit</button> -->


               </form>
               
            </div>
         </div>
         <div class="col-lg-3"></div>
      </div>
   </div>


</body>

</html>