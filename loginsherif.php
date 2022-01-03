<?php

if(isset($_POST['email'])){

$username=$_POST['email'];
$password=$_POST['pwd'];

$con=mysqli_connect('localhost','root','','hiking');
if(!$con)
	echo"error conneting to db";
$sql="select * from hiker where email='".$username."' AND pwd='".$password."'";

$result=$con->query($sql);

if($row=mysqli_fetch_array($result)){
    echo "You Have Successfully Logged in";

}
else{
    // echo $sql;
    echo " You Have Entered Incorrect Password or email";

}

}
?>