<?php

if(isset($_POST['submit'])){
include "sanitization.php";
include "validate.php";

// $photo=$_POST['photo'];

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
$encryption = openssl_encrypt($GLOBALS['pwd'], $ciphering,
			$encryption_key, $options, $encryption_iv);
			

// Display the encrypted string
// echo "Encrypted String: " . $encryption . "\n";

// // Non-NULL Initialization Vector for decryption
// $decryption_iv = '1234567891011121';

// // Store the decryption key
// $decryption_key = "GeeksforGeeks";

// // Use openssl_decrypt() function to decrypt the data
// $decryption=openssl_decrypt ($encryption, $ciphering,
// 		$decryption_key, $options, $decryption_iv);

// // Display the decrypted string
// echo "Decrypted String: " . $decryption;


// function insert(){
	// $con=mysqli_connect('localhost','root','','hiking');
   $con = new mysqli('localhost','root','','hiking');
	// echo"$fname";

if(!$con)
{
   // echo"error conneting to db";
   header("Location:errorpage.php");  
}
	

		$sql="INSERT INTO person(firstname,lastname,pwd,photo,email,address,mobile,gender,age,type) values('".$GLOBALS['fname']."','".$GLOBALS['lname']."','".$GLOBALS['encryption']."','".$GLOBALS['target_file']."','".$GLOBALS['email']."','".$GLOBALS['address']."','".$GLOBALS['phoneNumber']."','".$GLOBALS['gender']."','".$GLOBALS['age']."','hiker')";
		// $sql="INSERT INTO person(firstname,lastname,pwd,photo,email,address,mobile,gender,age,type) values('".$fname."','".$lname."','".$pwd."','".$photo."','".$email."','".$address."','".$phoneNumber."','".$gender."','".$age."','hiker')";
      $result = mysqli_query($con,$sql);
		if($result){	
         $sql="Select * from person where email ='".$GLOBALS["email"]."' and pwd='".$GLOBALS['encryption']."'";
	$result = mysqli_query($con,$sql);		
	if($row=mysqli_fetch_array($result)){
      session_start();
		$_SESSION['id']=$row['id'];
		$_SESSION['firstname']=$row['firstname'];
      $_SESSION['lastname']=$row['lastname'];
      $_SESSION['firstname']=$row['firstname'];
      $_SESSION['photo']=$row['photo'];
      $_SESSION['email']=$row['email'];
      $_SESSION['address']=$row['address'];
      $_SESSION['mobile']=$row['mobile'];
      $_SESSION['gender']=$row['gender'];
      $_SESSION['age']=$row['age'];
      $_SESSION['type']=$row['type'];


header("Location:homepagetrial.php");

		
	}
            
           
            // $sql="INSERT INTO hiker(firstname,lastname,pwd,photo,email,address,mobile,gender,age,id) values('".$_POST['fname']."','".$_POST['lname']."','".$_POST['pwd']."','".$_POST['photo']."','".$_POST['email']."','".$_POST['address']."','".$_POST['phoneNumber']."','".$_POST['gender']."','".$_POST['age']."',LAST_INSERT_ID ())";
            // if($con->query($sql)===true)
            // echo "record inserted";
			

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
   <title>Registration</title>
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
         color: black;
      }
 
   </style>
</head>
<?php 
include "headerbeforelogin.php";?>
<body>
   <div class="container">
      <div class="row">
         <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center"><b>Registration</b></h1><br>
               <form class="form-group text-center" action="" method="post" enctype="multipart/form-data">
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
                  <input type="email" name="email" class="form-control" placeholder="Enter your E-mail.." required><br>
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
                  <input type="text" name="address" class="form-control" placeholder="Enter your Address.." pattern="^(?=.*[a-z])(?=.*[0-9])+$" title="alphanumeric characters" required><br>
                  <label> Gender:</label><br>
                  <input type="radio" name="gender" value="male" required> <b>Male</b>
                  <input type="radio" name="gender" value="female" required> <b>Female</b>
                  <input type="radio" name="gender" value="others" required> <b>Others</b></br></br>
                  <label>Photo:</label><br>
                  <input type="file" name="photo" required><br><br>


                  <input type="submit" value="submit" name ="submit" onclick="Validate()" onclick="window.location.href='homepagetrial.php'">
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