<html>
<!-- <script src="//code.jquery.com/jquery.min.js"></script>
<script src="jquery.raty.js"></script> -->

    <head>
   
        <style>
        body
{
	background-color:#0B4C5F;
	font-family:helvetica;
	text-align:center;
}
h1
{
	margin-top:20px;
	font-size:40px;
	color:#E6E6E6;
}
#total_votes
{
	font-size:30px;
	color:#FE2E2E;
	font-weight:bold;
}
.div
{
	border:1px solid #E6E6E6;
	clear:both;
	margin-top:20px;
	height:100px;
	width:400px;
	padding:10px;
	margin-left:300px;
	border-radius:3px;
}
.div p
{
	margin:0px;
	font-size:20px;
	text-align:left;
	color:#E6E6E6;
}
img
{
	margin-top:10px;
	width:50px;
	height:50px;
	float:left;
	
}
input[type="submit"]
{
	border:none;
	background:none;
	background-color:#585858;
	width:100px;
	height:50px;
	color:white;
	border-radius:3px;
	font-size:17px;
	margin-top:20px;
}
        </style>
         <script type="text/javascript">
  
  function change(id)
  {
     var cname=document.getElementById(id).className;
     var ab=document.getElementById(id+"_hidden").value;
     document.getElementById(cname+"rating").value=ab;

     for(var i=ab;i>=1;i--)
     {
        document.getElementById(cname+i).src="star2.png";
     }
     var id=parseInt(ab)+1;
     for(var j=id;j<=5;j++)
     {
        document.getElementById(cname+j).src="star1.png";
     }
  }

  function reload(){
location.reload();

  }

</script>
    </head>
    <body>
        <!-- <form action="" method="post">

        <div class="rating">
<input type="hidden" name="star" id="1">
            <span name="star" value="1">☆</span>
            <input type="hidden" name="star" id="2">
            <span name="star" value="2">☆</span>
            <input type="hidden" name="star" id="3">

            <span name="star" value="3">☆</span>
            <input type="hidden" name="star" id="4">

            <span name="star" value="4">☆</span>
            <input type="hidden" name="star" id="5">

            <span name="star" value="5">☆</span>
            </div>
            <input type="hidden" name="itemrating" id="itemrating" value="0">
            <input type="submit" value="submit">
        </form> -->
        <?php
    $host="localhost";
    $username="root";
    $password="";
    $databasename="hiking";

    $connect=mysqli_connect($host,$username,$password,$databasename);
    // $db=mysqli_select_db($databasename);
	
    $select_rating=mysqli_query($connect,"select * from itemrating where itemid=453");
    $total=mysqli_num_rows($select_rating);
  
    while($row=mysqli_fetch_array($select_rating))
    {
	  $phpar[]=$row['stars'];
	//   $aspar[]=$asp;
	//   $jspar[]=$jsp;
	  
    }
    $total_php_rating=(array_sum($phpar)/$total);
    // $total_asp_rating=(array_sum($aspar)/$total);
    // $total_jsp_rating=(array_sum($jspar)/$total);
    echo "<div class="."div p".">";
    echo "<h1>average rating</h1>";
    for($i=0;$i<floor($total_php_rating);$i++){
        // echo "<option>".$arr[$i]."</option>";
     echo   "<img src="."star2.png".">";

    }
  echo  "<br>";
    for($i=1;$i<6;$i++){
    $select_rating=mysqli_query($connect,"select * from itemrating where itemid=453 and stars=".$i);
    $total1=mysqli_num_rows($select_rating);
  echo "<h1>".$total1."</h1>";
  for($j=0;$j<$i;$j++)
  echo   "<img src="."star2.png".">";
//   if($row['review'])
//   echo $row['review'];
}
echo "</div>";
?>

        <form method="post" action="">
  <!-- <br><p id="total_votes">Total Votes:<?php echo $total;?></p> -->
  <div class="div">
	  <!-- <p>PHP (<?php echo  $total_php_rating;?>)</p> -->
	  <input type="hidden" id="php1_hidden" value="1">
	  <img src="star1.png" onmouseover="change(this.id);" id="php1" class="php">
	  <input type="hidden" id="php2_hidden" value="2">
	  <img src="star1.png" onmouseover="change(this.id);" id="php2" class="php">
	  <input type="hidden" id="php3_hidden" value="3">
	  <img src="star1.png" onmouseover="change(this.id);" id="php3" class="php">
	  <input type="hidden" id="php4_hidden" value="4">
	  <img src="star1.png" onmouseover="change(this.id);" id="php4" class="php">
	  <input type="hidden" id="php5_hidden" value="5">
	  <img src="star1.png" onmouseover="change(this.id);" id="php5" class="php">
 
    </div>
    <h1>add a review</h1>
      <input type="text" name="review" required>
  <input type="hidden" name="phprating" id="phprating" value="0">
  
  <!-- <input type="hidden" name="asprating" id="asprating" value="0"> -->
  <!-- <input type="hidden" name="jsprating" id="jsprating" value="0"> -->
  <input type="submit" value="Submit" name="submit_rating" onclick="reload()">
        </form>
        <?php
if(isset($_POST['submit_rating']))
{
    $con=mysqli_connect('localhost','root','','hiking');
	// echo"$fname";
if(!$con)
	echo"error conneting to db";
		// $sql="INSERT INTO person(firstname,lastname,pwd,photo,email,address,mobile,gender,age,type) values('".$GLOBALS['fname']."','".$GLOBALS['lname']."','".$GLOBALS['pwd']."','".$GLOBALS['photo']."','".$GLOBALS['email']."','".$GLOBALS['address']."','".$GLOBALS['phoneNumber']."','".$GLOBALS['gender']."','".$GLOBALS['age']."','hiker')";
		// $sql="INSERT INTO person(firstname,lastname,pwd,photo,email,address,mobile,gender,age,type) values('".$fname."','".$lname."','".$pwd."','".$photo."','".$email."','".$address."','".$phoneNumber."','".$gender."','".$age."','hiker')";
       
		// if($con->query($sql)===true){	
            
            $sql="INSERT INTO itemrating(itemid,itemname,stars,review) values('453','','".$_POST['phprating']."','".$_POST['review']."')";
            if($con->query($sql)===true)
            echo "record inserted";
			// header("Location:homepagetrial.html");

        // }
		
		else{
			echo "Error:".$sql."<br>".$con->error;

		}
		$con->close();
  
//   $php_rating=$_POST['phprating'];
//   $asp_rating=$_POST['asprating'];
//   $jsp_rating=$_POST['jsprating'];
//   $insert=mysql_query("insert into rating values('','$php_rating','$asp_rating','jsp_rating')");
}
?>
    </body>
</html>

