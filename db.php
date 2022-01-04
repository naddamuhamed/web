<?php
include "sanitization.php";
include "validate.php";

$photo=$_POST['photo'];

function insert(){
	$con=mysqli_connect('localhost','root','','hiking');
	// echo"$fname";
if(!$con)
	echo"error conneting to db";
		$sql="INSERT INTO person(firstname,lastname,pwd,photo,email,address,mobile,gender,age,type) values('".$GLOBALS['fname']."','".$GLOBALS['lname']."','".$GLOBALS['pwd']."','".$GLOBALS['photo']."','".$GLOBALS['email']."','".$GLOBALS['address']."','".$GLOBALS['phoneNumber']."','".$GLOBALS['gender']."','".$GLOBALS['age']."','hiker')";
		// $sql="INSERT INTO person(firstname,lastname,pwd,photo,email,address,mobile,gender,age,type) values('".$fname."','".$lname."','".$pwd."','".$photo."','".$email."','".$address."','".$phoneNumber."','".$gender."','".$age."','hiker')";
       
		if($con->query($sql)===true){	
            
            // $sql="INSERT INTO hiker(firstname,lastname,pwd,photo,email,address,mobile,gender,age,id) values('".$_POST['fname']."','".$_POST['lname']."','".$_POST['pwd']."','".$_POST['photo']."','".$_POST['email']."','".$_POST['address']."','".$_POST['phoneNumber']."','".$_POST['gender']."','".$_POST['age']."',LAST_INSERT_ID ())";
            // if($con->query($sql)===true)
            // echo "record inserted";
			header("Location:homepagetrial.html");

        }
		
		else{
			echo "Error:".$sql."<br>".$con->error;

		}
		$con->close();
	}
    
// dsfsdL453+

// $sql="INSERT INTO hiker(firstname,lastname,pwd,id,photo,email,address,mobile,gender,age,type) values('".$_POST['fname']."','".$_POST['lname']."','".$_POST['pwd']."','".$_POST['photo']."','".$_POST['email']."','".$_POST['address']."','".$_POST['mobile']."','".$_POST['gender']."','".$_POST['age']."','".$_POST['type']."')";

// $age=$_POST['age'];
// // $conpwd=$_POST['conpwd'];
// $address=$_POST['address'];
// $gender=$_POST["gender"];
// $mobile=$_POST['phoneNumber'];
// $pwd=$_POST['pwd'];
// $email=$_POST['email'];
// $lname=$_POST['lname'];
// $fname=$_POST['fname'];




// $type=$_POST['type'];

insert();

?>