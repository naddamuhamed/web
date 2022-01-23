<html>
<head>
    <style>
         body {
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

.container {
         background-color: #0ACF5A;
         margin-top: 150px;
         border-radius: 30px;
         height: auto;
         margin-bottom: 50px;
         font-size: 15px;
      }

    </style>

</head>
<body>
    <?php include"headeraud.php"; ?>
    <div class="main">
    <div class="container">
<?php session_start(); 
?>
<!-- <form action="" method="post" name="tgrfdc"> -->
<h3><?php echo $_SESSION['q'] ?> </h3>
<?php
$count=[];
for($i=0;$i<$_SESSION['arr'];$i++){
    $count[$i]=0;
// echo $count[$i];
}

for($i=0;$i<sizeof($_SESSION['a']);$i++){

    for($j=0;$j<$_SESSION['arr'];$j++){ 
//         echo $_SESSION['a'][$i];
//  echo $_SESSION['c'][$j];
        if($_SESSION['a'][$i]==$_SESSION['c'][$j]) {
//  echo $_SESSION['a'][$i];
//  echo $_SESSION['c'][$j];
//  echo $count[$j];
            $count[$j]++;
            // echo $count[$j];

        }
       
    //  echo "<br>";
    }
   
 }

for($i=0;$i<$_SESSION['arr'];$i++){
   echo "<input type="."radio "."name="."choice " ."value=".$_SESSION['c'][$i].">".$_SESSION['c'][$i];
   echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$count[$i];
   echo "<br>";
}
?>

<!-- </form> -->
</div>
</div>
</body>
</html>