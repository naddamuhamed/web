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

.button1
{
    background-color: #F88306;
}
h1
{
    text-align: center;
    margin-top: 80px;
     color: white;
}
label
{
    color: white;
    text-align: center;
}
.txt
{
    padding-left: 110px;
}
.input2
{
    padding-left: 110px;
}
</style>

</head>
<body>
   <?php 
   session_start();
   include"headeraud.php"; ?>
   <div class="main">
    <div class="container">
       <h1><b>Survey</b></h1>
       <br>

<form action="" method="post" name="tgrfdc">
    <div class="txt">
<label><b>Enter your survey question</b></label>
<br>
<input type="text" name="question">
</div>
<br>
<br>
<div class="txt">
<label><b>Enter option number</b></label>
<br>
<input type="number" name="no">
<br>
<br>

 <button type="submit" class="button1" name="submit" value="submit" class="btn btn-primary">Submit</button>
 </div>
</form>    

<!-- <input type="text" name="" id=""> -->
 
<?php
if(isset($_POST['submit'])){
    //  echo"ihbkjn";
    echo "<h1><b>Enter option details</b></h1>";
    ?>
    <form action="s22.php" method="post" name="fvfdv">
        <?php
    // echo "<form action="."s2.php"." method="."post"." name="."fvfdv".">";
    $arrsize=$_POST['no'];
    $q=$_POST['question'];
    // echo $q;
    // session_start();
    $_SESSION['a']=array();
    $_SESSION['arr']=$arrsize;
    $_SESSION['q']=$q;
    ?>
    <div class="input2">
    <input type="hidden" name="arrsize" value="<?php $arrsize?>">
    <br>
    <input type="hidden" name="q" value="<?php $q?>">
    <?php
for($i=0;$i<$_POST['no'];$i++){
    echo"<input type="."text ". "name=".$i.">";
    ?>
    <br>
    <br>
   <?php
}
?>
<input type="submit" class="button1" value="submit" name="s">
</div>
</form>

<!-- <input type="radio" name="choice" value="$arr[$i]"> -->
<?php


//  echo "<input type="."submit" ."value="."submit"." name="."s".">";
    // echo "";
    if(isset($_POST['s'])){
       
         for($i=0;$i<$arrsize;$i++){
            $arr[]=$_POST['option'.$i];
         }
    ?>
    <h1>survey will look like this</h1>
    <h3><?php echo $q ?> </h3>
    <?php
    for($i=0;$i<$arrsize;$i++){
        echo "<input type="."radio"." name="."choice" ."value=".$arr[$i].">";
    }


    }
   
}
?>
</div>
</div>
</body>


</html>