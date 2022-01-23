<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>s2</title>
   <style>
        body {
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

.con {
         background-color: #0ACF5A;
         margin-top: 150px;
         border-radius: 30px;
         width: 400px;
         height: auto;
         margin-bottom: 50px;
         font-size: 15px;
      }
      h1
      {
         margin-top: 50px;
         text-align: center;
      }
      .txt1
      {
         text-align: center;
      }
   </style>
</head>
<body>
   <?php session_start();
   include"headeraud.html"; ?>
   <div class="main">
<div class="con">

<?php

if(isset($_POST['s'])){
       
    for($i=0;$i<$_SESSION['arr'];$i++){
       $arr[]=$_POST[$i];
    }
    // echo $_POST["option"];
    // echo $_SESSION['arr'];
    $_SESSION['c']=array();
for($i=0;$i<$_SESSION['arr'];$i++){
    $_SESSION['c'][$i]=$arr[$i];
    // echo  $_SESSION['c'][$i];
}
?>
<h1>survey will look like this</h1>
<br>
<form action="" class="txt1">
<h3><?php echo $_SESSION['q'] ?> </h3>
<?php
for($i=0;$i<$_SESSION['arr'];$i++){
   echo "<input type="."radio "."name="."choice " ."value=".$_SESSION['c'][$i].">".$_SESSION['c'][$i];
   echo "<br>";
}

}
?>
</form>
</div>
</div>
</body>
</html>