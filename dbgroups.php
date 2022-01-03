<?php

	$con=mysqli_connect('localhost','root','','hiking');
if(!$con)
	echo"error conneting to db";
		$sql="INSERT INTO groups(name,location,timeslotfrom,timeslotto,capacity,price) values('".$_POST['name']."','".$_POST['location']."','".$_POST['time']."','".$_POST['time2']."','".$_POST['capacity']."','".$_POST['price']."')";
		if($con->query($sql)===true)
			echo "record inserted";
		else{
			echo "Error:".$sql."<br>".$con->error;

		}
		$con->close();
	



?>