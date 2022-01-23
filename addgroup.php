<?php

   $con=mysqli_connect('localhost','root','','hiking');
if(isset($_POST['submit']))
{
if(!$con)
   // echo"error conneting to db";
   header("Location:errorpage.php");
      $sql="INSERT INTO groups(name,location,timeslotfrom,timeslotto,price) values('".$_POST['name']."','".$_POST['location']."','".$_POST['from']."','".$_POST['to']."','".$_POST['price']."')";
      if($con->query($sql)===true){
         // echo "record inserted";
         ?>
         <script>
          alert("Your data has been added..");
          </script>

         <!-- <div class="alert alert-success" role="alert">
         <strong></strong>your data have been added. -->
         <?php
        
      }
         // echo "record inserted";
      else{
         // echo "Error:".$sql."<br>".$con->error;
         header("Location:errorpage.php");
      }
      $con->close();
} 

?>


<!DOCTYPE html>
<html>

<head>
   <title>Add Group</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <style type="text/css">
       body {
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

#ui {
         background-color: #0ACF5A;
         padding: 20px;
         margin-top: 150px;
         border-radius: 50px;
      }


      #ui label,
      h1 {
         color: white;
      }
      .container
      {
        margin-right: 600px;
        width: 500px;
      }

   </style>
</head>
<?php
include "headeradmin.html";
?>

<body>
  <div class="main">
   <div class="container">
      <div class="row">
         <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">Add Group</h1><br>
               <form class="form-group text-center" action="#" method="post" >
                  <!--  enctype='multipart/form-data' onsubmit='return validate(this)' -->
                  <div class="row">
                     <div class="col-lg-6 ">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Group name.." pattern="[A-Za-z]{4,}" title="Only characters allowed, starting from 4 characters" required>
                     </div>
                       <div class="col-lg-6 ">
                         <label>Location:</label>
                  <input type="text" name="location" class="form-control" placeholder="Event Location" pattern="[A-Za-z]{4,}" title="Only characters allowed, starting from 4 characters" required>
                     </div>
                    
                  </div>
                  
                        <!-- <label>Group Capacity:</label>
                        <input type="number" name="capacity" class="form-control"
                           placeholder="how many in the group"required><br> -->
                      
        
                  <label>price:</label>
                  <input type="number" name="price" class="form-control" placeholder="the price of joining the group"required><br>
                 
                  <!-- <button type="submit"  value="submit" class="btn btn-primary">Submit</button> -->
                  <!-- <button type="button"  value="submit" class="btn btn-primary">Submit</button> -->

                       <div class="row">

                        <label>time from</label><br>


                        <input type="datetime-local" name="from"  required>
                           <br>
                     </div>
                     
                     
                 <br>

                     <div class="row">
                        <label>time to</label><br>

                       
                       <input type="datetime-local" name="to">
                           <br>

                     </div>
                    
                    <!-- <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('4').value = ''"> 
                       </input>
                   </div> -->
                  
                  <br>
                  <br>
                   <input type="submit" name="submit" value="submit" name ="submit">
               </form>
               
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</body>

</html>