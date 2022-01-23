<html>
<!-- <script src="//code.jquery.com/jquery.min.js"></script>
<script src="jquery.raty.js"></script> -->


    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <style>
.txt1
{
	/* background-color:#0B4C5F; */
	font-family:helvetica;
	text-align:center;
}
h1
{
	margin-top:20px;
	font-size:30px;
    color:black;
    font-weight:bold;
    margin-right: 350px;
}
#total_votes
{
	font-size:30px;
	color:black;
	font-weight:bold;
    margin-right: 350px;
}
.div
{
	/* border:1px solid #E6E6E6; */
	clear:both;
	/* margin-top:300px; */
	height:100px;
	width:400px;
	padding:10px;
	margin-right:500px;
    margin-left: 100px;
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
	margin-top:20px;
	width:50px;
	height:50px;
	float:left;
	
}
.button
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
    background-color: #F88306;
}
body {
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

      .container {
         background-color: #0ACF5A;
         padding: 20px;
         /* margin-top: 100px; */
         border-radius: 50px;
         width: 1000px;
         height: 900px;
         margin-left: 300px;
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
    <?php
     session_start();
     $_SESSION['id']=214;
     if(isset($_POST['submit_rating']))
     {
         $con=mysqli_connect('localhost','root','','hiking');
       // echo"$fname";
     if(!$con)
       echo"error conneting to db";
         // $sql="INSERT INTO person(firstname,lastname,pwd,photo,email,address,mobile,gender,age,type) values('".$GLOBALS['fname']."','".$GLOBALS['lname']."','".$GLOBALS['pwd']."','".$GLOBALS['photo']."','".$GLOBALS['email']."','".$GLOBALS['address']."','".$GLOBALS['phoneNumber']."','".$GLOBALS['gender']."','".$GLOBALS['age']."','hiker')";
         // $sql="INSERT INTO person(firstname,lastname,pwd,photo,email,address,mobile,gender,age,type) values('".$fname."','".$lname."','".$pwd."','".$photo."','".$email."','".$address."','".$phoneNumber."','".$gender."','".$age."','hiker')";
            
         // if($con->query($sql)===true){	
                 if($_POST['review']!=""){
                   $sql="INSERT INTO grouprating(gid,gname,stars,review) values('".$_SESSION['id']."','','".$_POST['phprating']."','".$_POST['review']."')";
          // ,'".$_POST['review']."'
          if($con->query($sql)===true)
         //  echo "record inserted";
         echo "";
         else{
          echo "Error:".$sql."<br>".$con->error;
    
        }
        }
          

else{
  $sql="INSERT INTO grouprating(gid,gname,stars) values('".$_SESSION['id']."','','".$_POST['phprating']."')";
                 // ,'".$_POST['review']."'
                 if($con->query($sql)===true)
                //  echo "record inserted";
                echo "";
                else{
                  echo "Error:".$sql."<br>".$con->error;
            
                }
}
                 
           // header("Location:homepagetrial.html");
     
             // }
         
         
         $con->close();
       
     //   $php_rating=$_POST['phprating'];
     //   $asp_rating=$_POST['asprating'];
     //   $jsp_rating=$_POST['jsprating'];
     //   $insert=mysql_query("insert into rating values('','$php_rating','$asp_rating','jsp_rating')");
     }
     
     ?>
  

        <div class="container">
        <?php
        
    $host="localhost";
    $username="root";
    $password="";
    $databasename="hiking";

    $connect=mysqli_connect($host,$username,$password,$databasename);
    // $db=mysqli_select_db($databasename);
	
    $select_rating=mysqli_query($connect,"select * from grouprating where gid=".$_SESSION['id']);
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
    ?>
     <div class="row">
    <div class="col-lg-3">
    <?php
    // echo "<div class="."div p".">";
    echo "<h2 class="."txt1".">average rating</h2>";
    ?>
</div>
<div class="col-lg-3">
    <?php
    // echo "<div class="."div p".">";
    echo "<h2 class="."txt1".">".floor($total_php_rating)." stars</h2>";
    ?>
</div>


 <div class="col-lg-6">
    <?php
    for($i=0;$i<floor($total_php_rating);$i++){
        // echo "<option>".$arr[$i]."</option>";
     echo   "<img src="."star2.png".">";

    }
  // echo  "<br>";
  ?>

</div>
</div>

<?php
    for($i=1;$i<6;$i++){
      ?>
      <div class="row">
    <div class="col-lg-6">
      <?php
    $select_rating=mysqli_query($connect,"select * from grouprating where gid='".$_SESSION['id']."' and stars=".$i);
    $total1=mysqli_num_rows($select_rating);
    for($j=0;$j<$i;$j++)
  echo   "<img src="."star2.png".">";
  
  echo "</div>";
  ?>
  <div class="col-lg-6">
    <?php
  echo "<h1>".$total1."</h1>";
  echo "</div>";
 
echo "</div>";
}
$query="select distinct review from grouprating where gid='".$_SESSION['id']."'";
$result = mysqli_query($connect,$query);
            while ($row= mysqli_fetch_array($result))
            {

               if($row['review']!='')
// echo "<p>".$row['review']."</p>";
echo $row['review'];
echo"<br>";
            }



?>

        <form method="post" action="">
  <br><p id="total_votes">Total Votes:<?php echo $total;?></p>
  <div class="div">
	  <!-- <p>PHP (<?php echo  $total_php_rating;?>)</p> -->
	  <input type="hidden" id="php1_hidden" value="1" required>
	  <img src="star1.png" onmouseover="change(this.id);" id="php1" class="php">
	  <input type="hidden" id="php2_hidden" value="2" required>
	  <img src="star1.png" onmouseover="change(this.id);" id="php2" class="php">
	  <input type="hidden" id="php3_hidden" value="3" required>
	  <img src="star1.png" onmouseover="change(this.id);" id="php3" class="php">
	  <input type="hidden" id="php4_hidden" value="4" required>
	  <img src="star1.png" onmouseover="change(this.id);" id="php4" class="php">
	  <input type="hidden" id="php5_hidden" value="5" required>
	  <img src="star1.png" onmouseover="change(this.id);" id="php5" class="php">
 
    </div>
    <h1>add a review</h1>
      <input type="text" name="review" >
  <input type="hidden" name="phprating" id="phprating" value="0">
  
  <!-- <input type="hidden" name="asprating" id="asprating" value="0"> -->
  <!-- <input type="hidden" name="jsprating" id="jsprating" value="0"> -->

  <button type="submit"  class="button" name="submit_rating" value="submit" onclick="reload()" class="btn btn-primary">Submit</button>
        </form>
        </div>
    
    </body>
</html>

