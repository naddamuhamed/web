    <!DOCTYPE html>
    <html>
    <head>
                  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>

<?php

session_start();

// Create connection
$con=mysqli_connect('localhost','root','','hiking');
$sql="delete from items where id =".$_GET['id'];
$result=mysqli_query($con,$sql);
if($result)
{
    ?>
        <div class="alert alert-warning alert-dismissible " role="alert">
  <strong>Alert!</strong>your data have been deleted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    
    <?php
    header("Location:tableproducts.php");
}
else
{
    echo $sql;
}
?>
    </body>
    </html>

