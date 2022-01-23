<?php
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


function insert(){
	$con=mysqli_connect('localhost','root','','hiking');
	// echo"$fname";

if(!$con)
	echo"error conneting to db";
		$sql="INSERT INTO person(firstname,lastname,pwd,photo,email,address,mobile,gender,age,type) values('".$GLOBALS['fname']."','".$GLOBALS['lname']."','".$GLOBALS['encryption']."','".$GLOBALS['target_file']."','".$GLOBALS['email']."','".$GLOBALS['address']."','".$GLOBALS['phoneNumber']."','".$GLOBALS['gender']."','".$GLOBALS['age']."','hiker')";
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
	// function retreive(){
		 
	// }
    
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