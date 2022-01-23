<?php
   $con=mysqli_connect('127.0.0.1','root','','hiking');
   $url = null;
   function Redirect($url)
   {
      echo "<script>window.open('{$url}','_self');</script>";
   }
    
    $id=null;  
    if(isset($_GET['ID'])){$id=$_GET['ID'];}
    
                
if((isset($_GET['ID']))){
            
            //bring the request from the DB using id
            $query = "SELECT * FROM investigation_requests WHERE id = '$id' ";        
            $result = mysqli_query ($con,$query);
            $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $auditor_name = $row['auditor_name'];
                    $admin_id = $row['admin_id'];
                    $issue_short_description = $row['issue_short_description'];
                    $issue_details = $row['issue_details'];
                    $request_date = $row['request_date'];

                    $status = $row['status'];
                    $hr_investigations = $row['hr_investigations'];
                    $hr_action = $row['hr_action'];
                    $hr_action_date = $row['hr_action_date'];
                    $penalty = $row['penalty'];
                    $comments = $row['comments'];
                    
                }
   
                if(isset($_POST['update'])){
                  $sql = "UPDATE investigation_requests SET";
                  if (isset($_POST['status'])){$status = $_POST['status'];$sql = $sql ." status = '$status'";};
                  if (isset($_POST['hr_investigations'])){$hr_investigations = $_POST['hr_investigations'];$sql = $sql ." , hr_investigations = '$hr_investigations'";};
                  if (isset($_POST['hr_action'])){$hr_action = $_POST['hr_action'];$sql = $sql ." , hr_action = '$hr_action'";};
                  if (isset($_POST['hr_action_date'])){$hr_action_date = $_POST['hr_action_date'];$sql = $sql ." , hr_action_date = '$hr_action_date'";};
                  if (isset($_POST['penalty'])){$penalty = $_POST['penalty'];$sql = $sql ." , penalty = '$penalty'";};
                  if (isset($_POST['comments'])){$comments = $_POST['comments'];$sql = $sql ." , comments = '$comments'";};
            
                  $sql = $sql." WHERE id = '$id'";
                  $sql = str_replace ("SET ,","SET",$sql);
                  $result = mysqli_query ($con,$sql);
            
                  
                  $result = mysqli_query ($con,$sql);
                  
                  sleep(1);

                  //to subtract the penalty from the employee's salary
                   $sql = "SELECT salary FROM person WHERE id = '$admin_id'";
                   $result = mysqli_query ($con,$sql);
                   $row = mysqli_fetch_assoc($result);
                   $salary = $row['salary'];
                   $salary = $salary - intval($penalty);
                  
                  //update the emp table with the new values of penalty, reason and salary
                  $sql = "UPDATE person SET";
                  if (isset($_POST['penalty'])){$penalty = $_POST['penalty'];$sql = $sql ." penalty = '$penalty' , salary = '$salary'";};
                  if (isset($_POST['comments'])){$comments = $_POST['comments'];$sql = $sql ." , reason = '$comments'";};    
                  $sql = $sql." WHERE id = '$admin_id'";  
                  $sql = str_replace ("SET ,","SET",$sql);      
                  $result = mysqli_query ($con,$sql);
            
                   if($result){
                     echo "penalties are inserted";
                   }
                  else{
                     echo "Error:".$sql."<br>".$con->error;
                  }
                   
                  
                  sleep(1);               
                  if($result){
                    
                     echo "check the new salary ;)";
                  }
                  else{
                     echo "Error:".$sql."<br>".$con->error;
            
                  }

                  $con->close();

                  Redirect("invreqtable.php");
            
                
                if(isset($_POST['cancel'])){
                  Redirect("invreqtable.php");
                }
               }
            
        
    
        

?>
<html>

<head>
    <head>
         
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Investigation Request <?php echo $id ?></title>
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
      #ui {
         background-color: darkslategrey;
         padding: 20px;
         margin-top: 60px;
         border-radius: 50px;
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
   </style>
</head>


   <div class="container">
      <div class="row">
         <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">Investigation Request</h1><br>
               <form class="form-group text-center" method="post" >
                  <!--  enctype='multipart/form-data' onsubmit='return validate(this)' -->
                  <label for = "id" >Request ID:</label>
                  <input type="text" name="id" class="form-control" value="<?php echo $id ?>" readonly>
                  <br>

                  <label for = "auditor_name" >Auditor Name:</label>
                  <input type="text" name="auditor_name" class="form-control" value="<?php echo $auditor_name ?>" readonly>
                  <br>

                  <label for = "admin_name" >Admin ID:</label>
                  <input type="text" name="admin_name" class="form-control" value="<?php echo $admin_id ?>" readonly>
                  <br>

                  <label for = "issue_short_description" >Issue Short Description:</label>
                  <input type="text" name="issue_short_description" class="form-control" value="<?php echo $issue_short_description ?>" readonly>
                  <br>

                  <label for = "issue_details" >Issue Details:</label>
                  <input type="text" name="issue_details" class="form-control" value="<?php echo $issue_details ?>" readonly>
                  <br>

                  <label for = "request_date" >Request Date:</label>
                  <input type="text" name="request_date" class="form-control" value="<?php echo $request_date ?>" readonly>
                  <br>
                  <hr>                  
                  
                <label for = "status">Status:</label>
                <input type="text" name="status" class="form-control" value="<?php echo $status ?>" >
                <br>

                <label for = "hr_investigations">HR Investigations:</label>
                <input type="text" name="hr_investigations" class="form-control" value="<?php echo $hr_investigations ?>" >
                <br>

                <label for = "hr_action">HR Actions Taken:</label>
                <input type="text" name="hr_action" class="form-control" value="<?php echo $hr_action ?>" >
                <br>

                <label for = "hr_action_date">HR Actions Date:</label>
                <input type="text" name="hr_action_date" class="form-control" value="<?php echo $hr_action_date ?>" >
                <br>

                <label for = "penalty">penalty:</label>
                <input type="text" name="penalty" class="form-control" value="<?php echo $penalty ?>" >
                <br>

                <label for = "comments">Comments:</label>
                <input type="text" name="comments" class="form-control" value="<?php echo $comments ?>">
                <br>

                <button type="submit" name="update" class="btn btn-success" value = "update" >Update</button>
                <button type="submit" name="cancel" class="btn btn-danger" value = "cancel">Cancel</button>
            </form>
               
            </div>
         </div>
         <div class="col-lg-3"></div>
      </div>
   </div>


</body>

</html>