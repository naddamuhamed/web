<?php
// include "sanitization.php";
// $val=true;
    //  firstname,lastname,pwd,photo,email,address,mobile,gender,age,type

// if (isset($_POST['lname'])){
    // echo "$lname";
if ($lname == "")
    // trigger_error("No lname was given",E_USER_WARNING);   
    header("Location:error.php");
        else{       
// $lname=$_POST['lname'];
if (!preg_match("/^[a-zA-Z ]*$/",$lname) ){  
    // $nameErr = "Only alphabets and white space are allowed";  
    header("Location:error.php");
        // echo $nameErr ;
}  
}
// }
 
// if (isset($_POST['fname'])) {
    if ($fname == "") 
    //    trigger_error("No fname was given",E_USER_WARNING);
    header("Location:error.php");
           else{
            // $fname=$_POST['fname'];
            if (!preg_match("/^[a-zA-Z ]*$/",$fname) ){  
    // $nameErr = "Only alphabets and white space are allowed"; 
    // echo $nameErr;
    header("Location:error.php");  
       }

 }
// }


// if (isset($_POST['email'])) {
    if ($email == "") 
    //    trigger_error("No email was given",E_USER_WARNING);
    header("Location:error.php");
    
else{
    // $email=$_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:error.php");     
           // echo "Invalid format and please re-enter valid email"; 
     }
    //  else
    //  echo "valid email";
}
// } 
// if (isset($_POST['pwd'])) {
    if ($pwd == "") 
    //   trigger_error("No password was given",E_USER_WARNING);
    header("Location:error.php");    
// }

// else{
//     // $pwd=$_POST['pwd'];
// }

    if ($conpwd == "") {
    //    trigger_error("No confirmation",E_USER_WARNING);
    header("Location:error.php");
    } 

// else{
//     // $conpwd=$_POST['conpwd'];
// }
    if ($phoneNumber== "")  {
    //    trigger_error("No mobile was given",E_USER_WARNING);
    header("Location:error.php");   
 } 
    else{
        // $phoneNumber=$_POST['phoneNumber'];
        if (!preg_match ("/^[0-9]*$/", $phoneNumber) ){  
            // $ErrMsg = "Only numeric value is allowed.";  
            // echo $ErrMsg;  
            header("Location:error.php");    
            } 
        // else   
        //     echo "valid";  
    
            $length = strlen ($phoneNumber);  
      
    if ( $length==11) {  
        //    echo "valid";
    } 
    else {  
    //    $ErrMsg = "Mobile must have 11 digits.";  
                // echo $ErrMsg;
                header("Location:error.php");    }  
    }

if($gender==""){   
    // $gender=$_POST["gender"];
    header("Location:error.php");
}
// else{
//   echo "No answers were selected";

// }

// if (isset($_POST['address'])) {
    if ($address == "") 
    //    trigger_error("No address was given",E_USER_WARNING);
    header("Location:error.php");
    // } 
// else{
    // $address=$_POST['address'];
// }

if ($age == "") 
header("Location:error.php");     
else{
    if (!filter_var($age, FILTER_VALIDATE_INT)) {
    header("Location:error.php");     
       // echo "invalid age"; 
 }
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