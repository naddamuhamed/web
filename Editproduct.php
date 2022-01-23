<?php
$con=mysqli_connect('localhost','root','','hiking');
$query="SELECT * FROM items WHERE id=".$_GET['id'];;
$result = mysqli_query($con,$query);
while ($row= mysqli_fetch_array($result))
            {

                $name  = $row['name'];
                $code = $row['code'];
                $price = $row['price'];
                $description = $row['description'];
                $photo = $row['photo'];
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

                  
                  $query="SELECT * FROM person WHERE id=".$_SESSION['id'];
$result = mysqli_query($con,$query);
while ($row= mysqli_fetch_array($result))
            {

               
                  $photo=$row['photo'];
            }
            $target_file=$photo;
               }


            $query="UPDATE items SET name='".$_POST['name']."', code='".$_POST['code']."', price='".$_POST['price']."', description='".$_POST['description']."', photo='".$_POST['photo']."' where id=".$_GET['id'];
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
?>
<html>
<head>
	<title>Edit Product</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
 body {
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
.img1{
  box-sizing: border-box;
  width: 149px;
  height: 149px;
  margin: 20px;
  border: 5px solid #0082e6;
  padding: 3px;
  background-color: white;
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
    <?php include "headeradmin.html" ?>
	<div class="container">
      <div class="row">
        <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">Edit Product</h1><br>
               <form class="form-group text-center" action="" method="post"  enctype='multipart/form-data>
                  <!-- ' onsubmit='return validate(this)' -->
<div  id="profile-container">
   <image class="img1" id="profileImage" src="<?php echo $photo ?>">
</image>
</div>
<input id="imageUpload" type="file" 
       name="photo" placeholder="Photo" capture>
   </input>
   <script type="text/javascript">
   $("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});
</script>   
<br>
<br>

                  <div class="row">
                     <div class="col-lg-3 ">
                        <label>Product Name</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="name" id="1" value="<?php echo $name ?>">
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
                        <label>Product Code</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="code" id="2" value="<?php echo $code ?>">
                           <br>

                     </div>
                   
                   <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('2').value = ''"> 
                       </input>
                   </div>

                  </div>
                  <br>
            
                  <div class="row">
                     <div class="col-lg-3">
                        <label>Price</label>
                    </div>
                     <div class="col-lg-3">
                        <input type="number" name="price" id="3" value="<?php echo $price ?>">
                           <br>
                     </div>

                     <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('3').value = ''"> 
                       </input>
                   </div>
                 </div>
                 <br>

                     <div class="row">
                     <div class="col-lg-3 ">
                        <label>Product Description</label>
                       
                     </div>

                     <div class="col-lg-3">
                       <input type="text" name="description" id="4" value="<?php echo $description ?>">
                           <br>

                     </div>
                    
                    <div class="col-lg-6">
                     <input type="button" name="" value="clear" onclick="document.getElementById('4').value = ''"> 
                       </input>
                   </div>
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