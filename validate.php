<?php
if (isset($_POST['lname'])){
if ($_POST['lname'] == "")
    trigger_error("No lname was given",E_USER_WARNING);
    // alert("fname must be filled out");   
      
    else{       
$lname=$_POST['lname'];
if (!preg_match("/^[a-zA-Z ]*$/",$lname) ){  
    $nameErr = "Only alphabets and white space are allowed";  
    echo $nameErr ;
}  
}
}
 
if (isset($_POST['fname'])) {
    if ($_POST['fname'] == "") 
       trigger_error("No fname was given",E_USER_WARNING);
       else{
            $fname=$_POST['fname'];
            if (!preg_match("/^[a-zA-Z ]*$/",$fname) ){  
    $nameErr = "Only alphabets and white space are allowed"; 
    echo $nameErr;
  
       }

 }
}


if (isset($_POST['email'])) {
    if ($_POST['email'] == "") 
       trigger_error("No email was given",E_USER_WARNING);

    
else{
    $email=$_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid format and please re-enter valid email"; 
     }
     else
     echo "valid email";
}
} 
if (isset($_POST['pwd'])) {
    if ($_POST['pwd'] == "") 
      trigger_error("No password was given",E_USER_WARNING);

    }

else{
    $pwd=$_POST['pwd'];
}

    if ($_POST['conpwd'] == "") {
       trigger_error("No confirmation",E_USER_WARNING);

    } 

else{
    $conpwd=$_POST['conpwd'];
}
    if ($_POST['phoneNumber'] == "")  {
       trigger_error("No mobile was given",E_USER_WARNING);

    } 
    else{
        $phoneNumber=$_POST['phoneNumber'];
        if (!preg_match ("/^[0-9]*$/", $phoneNumber) ){  
            $ErrMsg = "Only numeric value is allowed.";  
            echo $ErrMsg;  
        } 
        else   
            echo "valid";  
    
            $length = strlen ($phoneNumber);  
      
    if ( $length==11) {  
           echo "valid";
    } 
    else {  
       $ErrMsg = "Mobile must have 11 digits.";  
                echo $ErrMsg;
    }  
    }

if(isset($_POST["gender"])){   
    $gender=$_POST["gender"];
}else{
  echo "No answers were selected";
}

if (isset($_POST['address'])) {
    if ($_POST['address'] == "") 
       trigger_error("No address was given",E_USER_WARNING);

    } 
else{
    $address=$_POST['address'];
}


// $age=$_POST['age'];
// $conpwd=$_POST['conpwd'];
// $address=$_POST['address'];
// $gender=$_POST["gender"];
// $phoneNumber=$_POST['phoneNumber'];
// $pwd=$_POST['pwd'];
// $email=$_POST['email'];
// $lname=$_POST['lname'];
// $fname=$_POST['fname'];




// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     echo "Invalid format and please re-enter valid email"; 
//  }
//  else
//  echo "valid email";


//     if (!preg_match ("/^[0-9]*$/", $phoneNumber) ){  
//         $ErrMsg = "Only numeric value is allowed.";  
//         echo $ErrMsg;  
//     } 
//     else   
//         echo "valid";  

//         $length = strlen ($phoneNumber);  
  
// if ( $length==11) {  
//        echo "valid";
// } 
// else {  
//    $ErrMsg = "Mobile must have 11 digits.";  
//             echo $ErrMsg;
// }  

// if (!preg_match("/^[a-zA-Z ]*$/",$fname) ){  
//     $nameErr = "Only alphabets and white space are allowed"; 
//     echo $nameErr;
// }  

// if (!preg_match("/^[a-zA-Z ]*$/",$lname) ){  
//     $nameErr = "Only alphabets and white space are allowed";  
//     echo $nameErr ;
// }  


   


?>