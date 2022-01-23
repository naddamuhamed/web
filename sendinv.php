<?php
        $con=mysqli_connect('localhost','root','','hiking');
    $id = null ; 
    $admin_name = null;
    $issue_short_description = null;
    $issue_details = null; 
    $auditor_name = null;  
    $request_date = null;   
      if(isset($_POST['search_button'])){
      $values = $_POST['name'];        
      $query = "SELECT * FROM person WHERE CONCAT(firstname) Like (('%$values%')) ";        
      $result = mysqli_query($con,$query);
      if(mysqli_num_rows($result)>0){
                foreach($result as $row){
                    $id = $row['id'];
                    $admin_name = $row['firstname']." ".$row['lastname'];                   
                }
            }
      }    
    if(isset($_GET['ID'])){$id = $_GET['ID'];}
    if(isset($_POST['submit'])){
      $sql = "INSERT INTO investigation_requests SET";
      if (isset($_POST['auditor_name'])){$auditor_name = $_POST['auditor_name'];$sql = $sql ." auditor_name = '$auditor_name'";};
      if (isset($_POST['admin_id'])){$admin_id = $_POST['admin_id'];$sql = $sql ." , admin_id = '$admin_id'";};
      if (isset($_POST['issue_short_description'])){$issue_short_description = $_POST['issue_short_description'];$sql = $sql ." , issue_short_description = '$issue_short_description'";};
      if (isset($_POST['issue_details'])){$issue_details = $_POST['issue_details'];$sql = $sql ." , issue_details = '$issue_details'";};
      if (isset($_POST['request_date'])){$request_date = $_POST['request_date'];$sql = $sql ." , request_date = '$request_date'";};
      $sql = str_replace ("SET ,","SET",$sql);
//      print_r ($_POST);
      $result = mysqli_query ($con,$sql);

      $sql = str_replace("INSERT INTO","SELECT * FROM","$sql");
      $sql = str_replace("SET","WHERE","$sql");
      $sql = str_replace(",","AND","$sql");
      $result = mysqli_query ($con,$sql);
      $row = mysqli_fetch_assoc($result);
      $RID = $row['id'];
      
      header("Location: request_created_successfully.php?RID=$RID"); 
    } 
?>
<html>



    <head>
         
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Investigation Request</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <style type="text/css">

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}

      #ui label,
      h1 {
         color: white;
      }
      .col-lg-6
      {
         text-align: center;
      }
       .col-lg-12{
           text-indent: 250px;
       }

               body {
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

 #ui {
         background-color:#0ACF5A;
         padding: 20px;
         margin-top: 100px;
         border-radius: 50px;
      }
      .searchbutton
      {
        background-color:#F88306;
      }
   </style>
</head>

<body>
    <?php include "headeraud.php"; ?>
<div class="container">
   <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
         <div id="ui">
            <h1 class="text-center">Investigation Request</h1><br>
            
               
                  <!--  enctype='multipart/form-data' onsubmit='return validate(this)' -->
               <label >Admin Name:</label>
               <br>
               <div class="col-lg-11 ">                   
                  <form class="form-group text-center" method = "post" style="margin:auto;max-width:300px" >                         
                     <input type="text" placeholder="Search.." name="name" value="<?php echo $admin_name ?>" >
                     <button type="submit" name = "search_button" class="searchbutton" value = "search_button"><i class="fa fa-search"></i></button>
                  </form>                                
               </div>
               <form class="form-group text-center" method = "post" >
               
               <br>
               <br>
               <label for = "admin_id">Auditor Name:</label>
               <input type="text" name="auditor_name" class="form-control" placeholder="please enter your name" value="<?php echo $auditor_name ?>" required>   
               <br>
               <label for = "admin_id">Admin ID:</label>
               <input type="text" name="admin_id" class="form-control" placeholder="id of the name you already searched for" value="<?php echo $id ?>" required>   
               <br>
               <label for = "issue_short_description" >Issue Short Description:</label>
               <input type="text" name="issue_short_description" class="form-control" value="<?php echo $issue_short_description ?>" required>
               <br>
                
               <label for = "issue_details" >Issue Details:</label>
               <input type="text" name="issue_details" class="form-control" value="<?php echo $issue_details ?>">
               <br>
                                
               <div class="col-lg-6 ">                     
                  <label >Date:</label>
                  <br>
                  <input type="datetime-local" id="time" name="request_date" required>
               </div>
               <br>                     
               <br>
               <br>
               <br>
               <button type="submit" name="submit" value="submit" class="searchbutton" >Submit</button>               
               <!-- <button type="submit"  value="submit" class="btn btn-primary">Submit</button> -->
               <!-- <button type="button"  value="submit" class="btn btn-primary">Submit</button> -->
            </form>               
         </div>
      </div>
      <div class="col-lg-3"></div>
   </div>
</div>


</body>

</html>