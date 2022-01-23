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
<body><?php  session_start();
   include"header.php"; ?>
<div class="main">
    <div class="container">
   
   
<?php 
?>
<form action="" method="post" name="tgrfdc">
<h3><?php echo $_SESSION['q'] ?> </h3>
<?php
for($i=0;$i<$_SESSION['arr'];$i++){
   echo "<input type="."radio "."name="."choice " ."value=".$_SESSION['c'][$i].">".$_SESSION['c'][$i];
   echo "<br>";
}
?>
<button type="submit" name="submit">submit</button>
</form>
<?php
if(isset($_POST['submit'])){
$d=$_POST['choice'];

array_push($_SESSION['a'],$d);
// echo $_SESSION['a'];
// echo sizeof($_SESSION['a']);
// for($i=0;$i<sizeof($_SESSION['a']);$i++){
//    echo $_SESSION['a'][$i];
//     echo "<br>";
// }

}

?>
    </div>
</div>
</body>
</html>