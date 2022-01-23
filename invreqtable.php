<?php
        $conn=mysqli_connect('localhost','root','','hiking');
?>
<html>

<head>
    <head>
         
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Investigation Requests</title>
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

<div class="col-md-12">
        <div class="card container" style="margin-top: 100px;">
            <div class="card-header">
                <h3 class="mt-5">Investigation Requests</h3>
                <hr>
            </div>            
            <!--<div class="card-body">-->        
                <div class="form-group col-md-12">                                
                        <!-- Border-bottom color table start-->
                        <div class="col-xl-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Investigations requests opened by the auditors to investigate different suspected misbehavior of admins.</h5>
                                </div>
                                <div class="card-body table-border-style">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="border-bottom-danger">
                                                    <th>#</th>
                                                    <th>Auditor Name</th>
                                                    <th>Issue Short Description</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sql = "SELECT * FROM investigation_requests";
                                            $result = $conn->query($sql);
                                                if (!$result) {
                                                    trigger_error('Invalid query: ' . $conn->error);
                                                }    
                                                if ($result->num_rows > 0) {                
                                                        while($row = $result->fetch_assoc()) {
                                                            $id = $row["id"];
                                                            $auditor_name = $row["auditor_name"];
                                                            $issue_short_descrip = $row["issue_short_description"];
                                                            $status = $row["status"];

                                                            echo "<tr class='border-bottom-primary'>";
                                                            echo "<td><a href='invreq.php?ID=$id'>$id</a></td>";
                                                            echo "<td  >$auditor_name</td>";
                                                            echo "<td  ><a href='invreq.php?ID=$id'>$issue_short_descrip</a></td>";
                                                            echo "<td  >$status</td>";
                                                            echo "</tr>";
                                                        }
                                                }
                                            ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Border-bottom color table end-->
                                                    
                    </div>                    
                
            </div>
        <!--</div>-->
    </div>
</body>

</html>