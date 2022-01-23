<?php
        $con=mysqli_connect('localhost','root','','hiking');
    
?>
<html>

<head>
    <head>
         
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Investigation request created successfully</title>
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
                    <h3 class="mt-5">Request number - <?php echo $_GET['RID'] ?> created successfully</h3>
                    
                    <hr>
                </div>
                <div class="card-body">        
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <p>Thank you for taking time to open the investigation request.<br>Your request will be reviewed by an HR partner and you will be contacted soon.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <div class="col-lg-3"></div>
      </div>
   </div>


</body>

</html>