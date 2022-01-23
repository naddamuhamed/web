<?php
$con=mysqli_connect('localhost','root','','hiking');
$query="SELECT * FROM groups WHERE id=".$_GET['id'];
$result = mysqli_query($con,$query);
while ($row= mysqli_fetch_array($result))
            {

                $name     = $row['name'];
                $location     = $row['location'];
                $timeslotfrom = $row['timeslotfrom'];
                $timeslotto = $row['timeslotto'];
                $price = $row['price'];
               //  $capacity = $row['capacity'];
            }

session_start();
            if(isset($_POST['UPDATE'])){




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

                  
                  $query="SELECT * FROM groups WHERE id=".$_GET['id'];
$result = mysqli_query($con,$query);
while ($row= mysqli_fetch_array($result))
            {

               
                  $photo=$row['photo'];
            }
            $target_file=$photo;
               }




               // if($_POST['from']!=$timeslotfrom){
               //    $query="UPDATE groups SET name='".$_POST['name']."', location='".$_POST['loc']."', timeslotfrom='".$_POST['from']."', timeslotto='".$timeslotto."', price='".$_POST['price']."' where id=".$_GET['id'];
           
               // }
               // if($_POST['to']!=$timeslotto){
               //    $query="UPDATE groups SET name='".$_POST['name']."', location='".$_POST['loc']."', timeslotfrom='".$timeslotfrom."', timeslotto='".$_POST['to']."', price='".$_POST['price']."' where id=".$_GET['id'];
           
               // }

               // if($_POST['to']!=$timeslotto&&$_POST['from']!=$timeslotfrom){
               //    $query="UPDATE groups SET name='".$_POST['name']."', location='".$_POST['loc']."', timeslotfrom='".$_POST['from']."', timeslotto='".$_POST['to']."', price='".$_POST['price']."' where id=".$_GET['id'];
           
               // }
               // else{
               //    $query="UPDATE groups SET name='".$_POST['name']."', location='".$_POST['loc']."', timeslotfrom='".$timeslotfrom."', timeslotto='".$timeslotto."', price='".$_POST['price']."' where id=".$_GET['id'];
          
               // }

               $query="UPDATE groups SET name='".$_POST['name']."', location='".$_POST['loc']."', timeslotfrom='".$_POST['from']."', timeslotto='".$_POST['to']."', price='".$_POST['price']."', photo='".$target_file."' where id=".$_GET['id'];
           


            $result = mysqli_query($con,$query);
            if($result){
       $_SESSION['update']="data updated successfully";
              // header("Location:editp.php");
            }
            else{
                $_SESSION['update']="Not updated";

              //  header("Location:editp.php");
                
            }
            $query="SELECT * FROM groups WHERE id=".$_GET['id'];
$result = mysqli_query($con,$query);
            while ($row= mysqli_fetch_array($result))
            {

                $name     = $row['name'];
                $location     = $row['location'];
                $timeslotfrom = $row['timeslotfrom'];
                $timeslotto = $row['timeslotto'];
                $price = $row['price'];
               //  $capacity = $row['capacity'];
            }

        }
?>
<html>
<head>
	<title>Edit hiking groups</title>
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
      .container
      {
        margin-left: 500;
      }
       .col-lg-6
      {
         text-align: center;
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
    <?php include "headeradmin.html"?>
	<div class="container">
      <div class="row">
          <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">Edit hiking groups</h1><br>
               <form class="form-group text-center" action="" method="post" enctype='multipart/form-data' >
                  <!--  onsubmit='return validate(this)' -->
                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Name</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="name"  id="1" value="<?php echo $name ?>">
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
                        <label>location</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="loc" id="2" value="<?php echo $location ?>">
                           <br>

                     </div>
                   
                   <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('2').value = ''"> 
                       
                   </div>

                  </div>
                  <br>
            
                  <div class="row">
                     <div class="col-lg-3">
                        <label>time from</label>
                    </div>
                     <div class="col-lg-3">
                        <input type="text" name="from"  value="<?php echo $timeslotfrom ?>" readonly>
                        <input type="datetime-local" name="from"required >
                           <br>
                     </div>
                     
                     
                 </div>
                 <br>

                     <div class="row">
                     <div class="col-lg-3 ">
                        <label>time to</label>
                       
                     </div>

                     <div class="col-lg-3">
                        <input type="text" name="to"  value="<?php echo $timeslotto ?>"readonly>
                       <input type="datetime-local" name="to" required>
                           <br>

                     </div>
                    
                    <!-- <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('4').value = ''"> 
                       </input>
                   </div> -->
                  </div>
                  <br>

                  <!-- <div class="row">
                     <div class="col-lg-3 ">
                        <label>capacity</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="number" name="capacity" onfocus="this.value=''" id="5" value="<?php echo $capacity ?>">
                           <br>

                     </div>
                    
                    <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('5').value = ''"> 
                       </input>
                   </div>
                  </div>
                  <br> -->


                       <div class="row">
                     <div class="col-lg-3 ">
                        <label>price</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="price"  id="6" value="<?php echo $price ?>">
                           <br>

                     </div>
                     <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('6').value = ''"> 
                       </input>
                   </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-3 ">
                        <label>photo</label>
                       
                     </div>
                  <input type="file" name="photo" id="photo">

                  </div>

                  <br>
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