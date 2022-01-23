<?php
session_start();
$con=mysqli_connect('localhost','root','','hiking'); 
if(isset($_POST['UPDATE'])){

   $query="SELECT * FROM person WHERE id=".$_SESSION['id'];
$result = mysqli_query($con,$query);
while ($row= mysqli_fetch_array($result))
            {

               
                  $password=$row['pwd'];

            }
if($password!=$_POST['pwd']){
   $ciphering = "AES-128-CTR";

   // Use OpenSSl Encryption method
   $iv_length = openssl_cipher_iv_length($ciphering);
   $options = 0;
   
   // Non-NULL Initialization Vector for encryption
   $encryption_iv = '1234567891011121';
   
   // Store the encryption key
   $encryption_key = "GeeksforGeeks";
   
   // Use openssl_encrypt() function to encrypt the data
   $encryption = openssl_encrypt($_POST['pwd'], $ciphering,
            $encryption_key, $options, $encryption_iv);

}
else{
   $encryption=$password;
}

               if(basename($_FILES["photo"]["name"]!="")){
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
               }
               else{

                  
                  $query="SELECT * FROM person WHERE id=".$_SESSION['id'];
$result = mysqli_query($con,$query);
while ($row= mysqli_fetch_array($result))
            {

               
                  $photo=$row['photo'];
            }
            $target_file=$photo;
               }
              


            $query="UPDATE person SET firstname='".$_POST['fname']."', lastname='".$_POST['lname']."', email='".$_POST['email']."', pwd='".$encryption."', address='".$_POST['address']."', mobile= '".$_POST['mobile']."', age='".$_POST['age']."', photo='".$target_file."' where id=".$_SESSION['id'];
            $result = mysqli_query($con,$query);
            if($result){
       $_SESSION['update']="data updated successfully";
              // header("Location:editp.php");
            }
            else{
                $_SESSION['update']="Not updated";

              //  header("Location:editp.php");
                
            }
        }
$query="SELECT * FROM person WHERE id=".$_SESSION['id'];
$result = mysqli_query($con,$query);
while ($row= mysqli_fetch_array($result))
            {

                $fname     = $row['firstname'];
                $lname     = $row['lastname'];
                $email = $row['email'];
                $pwd = $row['pwd'];
                $address = $row['address'];
                 $mobile = $row['mobile'];
                  $age = $row['age'];
                  $photo=$row['photo'];
            }


           
?>
<html>
<head>
	<title>Edit hiker profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
.img1{
  box-sizing: border-box;
  width: 149px;
  height: 149px;
  margin: 20px;
  border: 5px solid #0082e6;
  padding: 3px;
  background-color: white;
}
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
         color: white;
      }
   
<?php
if(isset($_SESSION['update'])){
echo "<h4>".$_SESSION['update']."</h4>";
unset($_SESSION['update']);
}
?>

</style>
</head>


<body>
<?php
include "header.php";
?>
	<div class="container">
      <div class="row">
          <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">Edit hiker's profile</h1><br>
               <form class="form-group text-center" action="" method="post" enctype="multipart/form-data" >

<div  id="profile-container">
   <image class="img1" id="profileImage" src="<?php echo $photo ?>" />
</image>
</div>
<input id="photo" type="file" name="photo" placeholder="Photo" >
   </input>
   <script type="text/javascript">
   $("#profileImage").click(function(e) {
    $("#photo").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#photo").change(function(){
    fasterPreview( this );
});
</script>   
<br>
<br>
                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>First name</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text"name="fname" id="1" value="<?php echo $fname ?>" pattern="[A-Za-z]{4,}" title="Only characters allowed, starting from 4 characters"  required>
                           <br>

                     </div>

                    <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('1').value = ''"> 
                       
                   </div>

                  </div>
                  <br>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Last name</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="lname" id="2" value="<?php echo $lname ?>" pattern="[A-Za-z]{4,}" title="Only characters allowed, starting from 4 characters" required>
                           <br>

                     </div>
                   
                   <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('2').value = ''"> 
                      
                   </div>

                  </div>
                  <br>
            
                  <div class="row">
                     <div class="col-lg-3">
                        <label>Email</label>
                    </div>
                     <div class="col-lg-3">
                        <input type="email" name="email" id="3" value="<?php echo $email ?>" required>
                           <br>
                     </div>

                     <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('3').value = ''"> 
                    
                   </div>
                 </div>
                 <br>

                     <div class="row">
                     <div class="col-lg-3 ">
                        <label>Password</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="password" name="pwd"  id="4" value="<?php echo $pwd ?>" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$" title="Must contain at least one number, one uppercase letter, one lowercase letter, and one special character '!@#$%^&*_=+-', and at least 8 or more characters" required>
                           <br>

                     </div>
                    
                    <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('4').value = ''"> 
                      
                   </div>
                  </div>
                  <br>
               
                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Confirm password</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="password" name="conpwd"  id="5" value="<?php echo $pwd ?>" required>
                           <br>

                     </div>
                       <script >
    function Validate() {
        var password = document.getElementById("4").value;
        var confirmPassword = document.getElementById("5").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
       
</script>
                    <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('5').value = ''"> 
                       
                   </div>
                  </div>
                  <br>


                       <div class="row">
                     <div class="col-lg-3 ">
                        <label>Address</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="address" id="6" value="<?php echo $address ?>" pattern="^(?=.*[a-z])(?=.*[0-9])+$" title="alphanumeric characters" required>
                           <br>

                     </div>
                     <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('6').value = ''"> 
                       
                   </div>
                  </div>
                  <br>

                     <div class="row">
                     <div class="col-lg-3 ">
                        <label>Mobile</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="mobile"  id="7" value="<?php echo $mobile ?>" pattern="[0-9]{11}" title="Mobile number must be 11 numbers long" required>
                   </div>
                   <div class="col-lg-6">
                       <input type="button" name="" value="clear" onclick="document.getElementById('7').value = ''"> 
                      
                   </div>
                           <br>
                     

                  </div>
                  <br>
                      
                    <div class="row">
                     <div class="col-lg-3 ">
                        <label>Age</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="age"  id="8" value="<?php echo $age ?>" pattern="[12][0-9]|3[01]{1,2}" title="Enter valid age from 10 to 31" required>
                           <br>

                     </div>
                     <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('8').value = ''"> 
                       
                   </div>
                  </div>   
                  <br>

                  <!-- <input type="submit" value="submit" name ="submit"> -->
                  <button type="submit"  name="UPDATE" value="Update" class="btn btn-primary" onclick="Validate()">Update</button>



               </form>
            </div>
         </div>
      </div>
   </div>
</body>
</html>