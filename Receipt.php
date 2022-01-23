<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
 
 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    

  <title></title>
  <style>
  

 .main thead {
     background: #1E1F23;
     color: #fff
 }

 .img {
     height: 100px

 }


  body {
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

      .container{
         background-color: #0ACF5A;
         width: 800px;
         height:800px;
         margin-top: 200px;
         border-radius: 50px;
         margin-bottom: 30px;
         padding: 20px ;
         position: relative;
         font-size: 20px;
      }

  </style>
</head>
<body>
<div class="container">
<?php
$con=mysqli_connect('localhost','root','','hiking');
if(!$con)
   echo"error conneting to db";
$result = mysqli_query($con,"SELECT * FROM orders");
?>

        <div class="row">
            <div class="col-md-6 col-md-offset-3 body-main">
                 <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                        <img class="img"  src="http://pngimg.com/uploads/shopping_cart/shopping_cart_PNG59.png" />
                     </div>
                     <div class="col-lg-8">
                        <br>
                        
                         <h2><b>Receipt</b></h2>
                            
                             </div>
                       
                    </div> <br />
                    <div class="row">
                       
                    </div> <br />
                    <div>
                        <?php
if (mysqli_num_rows($result) > 0) {
?>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <h3>Product name</h3>
                                    </th>
                                    <th>
                                        <h3>Amount</h3>
                                    </th>
                                    <th>
                                        <h3>Price</h3>
                                    </th>
                                    <th>
                                        <h3>Total</h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               $i=0;

while($row = mysqli_fetch_array($result)) {
?>



                                <tr>
                                    <td class="col-md-9"><?php echo $row["pname"]; ?></td>
                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i><?php echo $row["pquantity"]; ?> </td>
                                   <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i><?php echo $row["pprice"]; ?> </td>
                                  <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i><?php echo  $row['pquantity']*$row['pprice'] ; ?> </td>


                                </tr>
                                                            <?php
$i++;
?>

                                <tr style="color: #F81D2D;">
                                    <td class="text-right">
                                        <h4><strong>Total:</strong></h4>
                                    </td>
                                    <td class="text-left">
                                        <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $row["totalamount"]; ?> </strong></h4>
                                    </td>
                                    <?php
                                    }
?>
                                </tr>
                            </tbody>

                        </table>
                        <?php
                        }  ?>
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
    </div>
</div>
</body>
</html>