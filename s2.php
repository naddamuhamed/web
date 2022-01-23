<html>

<?php
session_start();
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
<form action="">
<h3><?php echo $_SESSION['q'] ?> </h3>
<?php
for($i=0;$i<$_SESSION['arr'];$i++){
   echo "<input type="."radio "."name="."choice " ."value=".$_SESSION['c'][$i].">".$_SESSION['c'][$i];
   echo "<br>";
}
// $_SESSION['c']=array();
// for($i=0;$i<$_SESSION['arr'];$i++){
//     // $_SESSION['c'][$i]=$arr[$i];
//     echo  $_SESSION['c'][$i];
// }


}
?>
</form>
</html>