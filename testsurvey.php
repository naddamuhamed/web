<html>
<?php session_start(); ?>
<h3><?php echo $_SESSION['q'] ?> </h3>
<?php
for($i=0;$i<$_SESSION['arr'];$i++){
   echo "<input type="."radio "."name="."choice " ."value=".$_SESSION['c'][$i].">".$_SESSION['c'][$i];
   echo "<br>";
}
?>
</html>