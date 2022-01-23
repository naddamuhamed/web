<?php
$con=mysqli_connect('localhost','root','','hiking');
$query="SELECT * FROM person WHERE id=".$_GET['id'];
$result = mysqli_query($con,$query);
while ($row= mysqli_fetch_array($result))
            {

                $fname= $row['firstname'];
                $lname= $row['lastname'];
                $pwd = $row['pwd'];
                $email = $row['email'];
                $age = $row['age'];
                $mobile = $row['mobile'];
                $type = $row['type'];
                $ssn = $row['ssn'];
                $address = $row['address'];
                $salary = $row['salary'];
            }

            session_start();
            if(isset($_POST['UPDATE'])){
            $query="UPDATE person SET firstname='".$_POST['fname']."', lastname='".$_POST['lname']."', pwd='".$_POST['pwd']."', email='".$_POST['email']."' , age='".$_POST['age']."' , mobile='".$_POST['mobile']."',type='".$_POST['type']."',ssn='".$_POST['ssn']."',address='".$_POST['address']."',salary='".$_POST['salary']."' where id=".$_GET['id'];
            $result = mysqli_query($con,$query);
            if($result){
       $_SESSION['update']="data updated successfully";
              // header("Location:editp.php");
            }
            else{
                $_SESSION['update']="Not updated";

              //  header("Location:editp.php");
                
            }
            $query="SELECT * FROM person WHERE id=".$_GET['id'];
$result = mysqli_query($con,$query);
            while ($row= mysqli_fetch_array($result))
            {

                $fname= $row['firstname'];
                $lname= $row['lastname'];
                $pwd = $row['pwd'];
                $email = $row['email'];
                $age = $row['age'];
                $mobile = $row['mobile'];
                $type = $row['type'];
                $ssn = $row['ssn'];
                $address = $row['address'];
                $salary = $row['salary'];
            }

        }
?>
<html>
<head>
    <title>Edit Employee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
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

<?php include"headeradmin.html"; ?>
<body>
    <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">Edit Employee profile</h1><br>
               <form class="form-group text-center" action="" method="post"  >
                  <!-- enctype='multipart/form-data' onsubmit='return validate(this)' -->
                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>First name</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="fname" onfocus="this.value=''" id="1" value="<?php echo $firstname ?>">
                           <br>

                     </div>
                    
                    <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('1').value = ''"> 
                       </input>
                   </div>

                  </div>
                  <br>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Last name</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="lname" onfocus="this.value=''" id="2" value="<?php echo $lastname ?>">
                           <br>

                     </div>
                   
                   <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('2').value = ''"> 
                       </input>
                   </div>

                  </div>
                  <br>

                     <div class="row">
                     <div class="col-lg-3 ">
                        <label>Password</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="password" name="pwd" onfocus="this.value=''" id="3" value="<?php echo $pwd ?>">
                           <br>

                     </div>
                    
                    <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('3').value = ''"> 
                       </input>
                   </div>
                  </div>
                  <br>

                   <div class="row">
                     <div class="col-lg-3">
                        <label>Email</label>
                    </div>
                     <div class="col-lg-3">
                        <input type="text" name="email" onfocus="this.value=''" id="4" value="<?php echo $email ?>">
                           <br>
                     </div>

                     <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('4').value = ''"> 
                       </input>
                   </div>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-lg-3 ">
                        <label>Age</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="number" name="age" onfocus="this.value=''" id="5" value="<?php echo $age ?>">
                           <br>

                     </div>
                     <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('5').value = ''"> 
                       </input>
                   </div>
                  </div>
                  <br>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Mobile</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="mobile" onfocus="this.value=''" id="6" value="<?php echo $mobile ?>">
                   </div>
                   <div class="col-lg-6">
                       <input type="button" name="" value="clear" onclick="document.getElementById('6').value = ''"> 
                       </input>
                   </div>
                           <br>
                     

                  </div>
                  <br>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Type</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="type" onfocus="this.value=''" id="7" value="<?php echo $type ?>">
                   </div>
                   <div class="col-lg-6">
                       <input type="button" name="" value="clear" onclick="document.getElementById('7').value = ''"> 
                       </input>
                   </div>
                           <br>
                     

                  </div>
                  <br>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>SSN</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="ssn" onfocus="this.value=''" id="8" value="<?php echo $ssn ?>">
                   </div>
                   <div class="col-lg-6">
                       <input type="button" name="" value="clear" onclick="document.getElementById('8').value = ''"> 
                       </input>
                   </div>
                           <br>
                  </div>
                  <br>

                       <div class="row">
                     <div class="col-lg-3 ">
                        <label>Address</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="address" onfocus="this.value=''" id="9" value="<?php echo $address ?>">
                           <br>

                     </div>
                     <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('9').value = ''"> 
                       </input>
                   </div>
                  </div>
                  <br>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Salary</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="salary" onfocus="this.value=''" id="10" value="<?php echo $salary?>">
                   </div>
                   <div class="col-lg-6">
                       <input type="button" name="" value="clear" onclick="document.getElementById('10').value = ''"> 
                       </input>
                   </div>
                           <br>
                  </div>
                  <br>

                  <!-- <input type="submit" value="submit" name ="submit"> -->
                  <button type="submit" name="UPDATE" value="Update" class="btn btn-primary">Update</button>



               </form>
            </div>
         </div>
      </div>
   </div>

</body>
</html>