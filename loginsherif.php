<?php

if(isset($_POST['submit'])){

$username=$_POST['email'];
$password=$_POST['pwd'];
$ciphering = "AES-128-CTR";

// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';

// Store the encryption key
$encryption_key = "GeeksforGeeks";

// Use openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($password, $ciphering,
			$encryption_key, $options, $encryption_iv);


$con=mysqli_connect('localhost','root','','hiking');
if(!$con)
	echo"error conneting to db";
$sql="select * from person where email= '".$username."' AND pwd= '".$encryption."'";

// $sql="select * from hiker where email='".$username."' AND pwd='".$password."'";
$result=$con->query($sql);

if($row=mysqli_fetch_array($result)){
    // echo "You Have Successfully Logged in";
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

  if($_SESSION['type']=='hiker')
    header("Location:homepagetrial.php");
    else if($_SESSION['type']=='admin')
    header("Location:adminhomepage.php");
    else if($_SESSION['type']=='auditor')
    header("Location:auditorhomepage.php");
    else if($_SESSION['type']=='hr')
    header("Location:hrhomepage.html");

}
else{
    // echo $sql;
    // echo " You Have Entered Incorrect Password or email";
    header("Location:errorpage.php");

}

}
?>