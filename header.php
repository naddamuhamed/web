<?php
// session_start();
// if($_SESSION['type']!='hiker')
// header("Location:errorpage.php");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>header</title>
  <style type="text/css">
    

.container2 {
position: relative;
}
.text-block {
  position: absolute;
  top:60px;
  right:8px;
  left:10px ;
  color: black;
  padding-left: 20px;
  padding-right: 20px;
  font-size: 20px;
  text-align: center;
}
.menu-bar{
  background: #0ACF5A;
  text-align: center;
}
.menu-bar ul{
  display: inline-flex;
  list-style: none;
  color: black;
}

.menu-bar ul li{
  width: 120px;
  margin: 5px;
  padding: 15px;
}

.menu-bar ul li a{
  text-decoration: none;
  color: white;
}
.active, .menu-bar ul li:hover{
  background: #F87F07;
  border-radius:3px ;
}

.sub-menu-1{
display: none;
}

.menu-bar ul li:hover .sub-menu-1{
  display:block ;
  position: absolute;
  background: black;
  margin-top: 15px;
  margin-left: -15px;
}

.menu-bar ul li:hover .sub-menu-1 ul {
  display: block;
  margin: 10px;
}
.menu-bar ul li:hover .sub-menu-1 ul li{
  width: 150px;
  padding: 10px;
  border-bottom: 1px dotted #fff;
  background: transparent;
  border-radius:0 ;
  text-align: left;
}

.menu-bar ul li:hover .sub-menu-1 ul li: last-child{
  border-bottom: none;
}

.menu-bar ul li:hover .sub-menu-1 ul li a:hover{
  color:#F88306;
}


  </style>
</head>
<body>


  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="hiking-header.jpg" alt="Los Angeles" width="1520px" height="600px">
      </div>

      <div class="item">
        <img src="headpic.png" alt="Chicago" width="1520px" height="600px">
      </div>
    
      <div class="item">
        <img src="headpic2.png" alt="New york" width="1520px" height="600px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>



 <div class="text-block">
  <h1><b>Hiking Club</b></h1>
  <p><b>When life gives you mountains, put on your boots and HIKE..</b></p>
 </div>

  
  

    <div class="menu-bar">
   
        <ul>
     <ul>
          <li class="active"><a href="homepagetrial.php">Home</a></li>
          <li><a href="viewprofile.php">View profile</a></li>
             <li><a href="EditProfilelast.php">Edit profile</a></li>
              <li><a href="choosegroup.php">Choose group</a></li>
               <li><a href="items.php">Shop</a>
                <div class="sub-menu-1">
                  <ul>
                    <li><a href="items.php">Product</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="ratingpro.php">Review</a></li>
                  </ul>
                </div>
               </li>

<!--                <li><a href="#">Skills</a>
                <div class="sub-menu-1">
                  <ul>
                    <li><a href="#">Hiking Trips</a></li>
                    <li><a href="#">Hiking Skills</a></li>
                    <li><a href="#">Trip preparation</a></li>
                    <li><a href="#">Health & Safety</a></li>
                  </ul>
                </div>
               </li>
 -->               <li><a href="messageshiker.php">Messages</a></li>
                <li><a href="contactus.php">Contact Us</a></li>

                 <li><a href="logout.php">LogOut</a></li>      </div>


</body>
</html>