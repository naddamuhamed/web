<html>
<head>


</head>
<body>
<form action="" method="post" name="tgrfdc">
enter your survey question<input type="text" name="question">
enter option number<input type="number" name="no">
<input type="submit" value="submit" name="submit">
</form>    
<!-- <input type="text" name="" id=""> -->
 
<?php
if(isset($_POST['submit'])){
    //  echo"ihbkjn";
    echo "<h1>enter option details</h1>";
    ?>
    <form action="s2.php" method="post" name="fvfdv">
        <?php
    // echo "<form action="."s2.php"." method="."post"." name="."fvfdv".">";
    $arrsize=$_POST['no'];
    $q=$_POST['question'];
    echo $q;
    session_start();
    $_SESSION['a']=array();
    $_SESSION['arr']=$arrsize;
    $_SESSION['q']=$q;
    ?>
    <input type="hidden" name="arrsize" value="<?php $arrsize?>">
    <input type="hidden" name="q" value="<?php $q?>">
    <?php
for($i=0;$i<$_POST['no'];$i++){
    echo"<input type="."text ". "name=".$i.">";
   
}
?>
<input type="submit" value="submit" name="s">
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
</body>


</html>