<!DOCTYPE html>
<html>
<body>

<?php
     
if (isset($_POST['fname']) && isset($_POST['lname']) ){
$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
echo $lname,$fname;
// $fname=$newfname;
// $lname=$newlname;
}

if (isset($_POST['email'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    echo $email;
// $email=$newemail;
}

if(isset($_POST['pwd'])&&  isset($_POST['conpwd'])){
$pwd = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);
$conpwd = filter_var($_POST['conpwd'], FILTER_SANITIZE_STRING);
echo $pwd,$conpwd;
// $pwd = $newpassword;
// $conpwd = $newconpwd;
}

if (isset($_POST['phoneNumber'])){
$phoneNumber = filter_var($_POST['phoneNumber'], FILTER_SANITIZE_NUMBER_INT);
echo $phoneNumber;
}
// $phoneNumber = $newphoneNumber;

if (isset($_POST['address'])){
$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
echo $address;
// $address = $newaddress;
}

?>

</body>
</html>
