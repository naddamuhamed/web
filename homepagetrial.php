<?php
session_start();

// session_start();
// if($_SESSION['type']!='hiker')
// header("Location:errorpage.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Homepage</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
 *{
  margin:0 ;
  padding: 0;

}
 * {
  box-sizing: border-box;
}

.row
{
  border: 2px solid;
  padding: 20px; 
  width: 1200px;
  left: 70;
  font-size: 17px;
  overflow: auto;
  display: flex;
  flex-wrap: wrap;
 text-align: center;
}
.container1{
max-width: 2000px;
margin: auto;
}
.row1{
  display: flex;
  flex-wrap: wrap;
}
ul{
list-style: none}
.footer{
background-color: black ;
padding: 70px 0;
}
.footer-col{
width: 25%;

}
.footer-col h4{
  font-size: 18px;
  color: #ffffff;
  text-transform: capitalize;
  margin-bottom: 30px;
}

.column1 {
  float: left;
  width: 33.33%;
  padding: 5px;
  text-decoration: none;

}

.column2 {
  float: right;
  width:170px;
  padding: 5px;
  font-size: 15px;
}
.row2::after {
  content: "";
  clear: both;
  display: table;
}
.p1
{
  display: inline-block;
}

.x{
  text-align: center;
  font: sans-serif;
  font-size: 20px;
}
.y{
  text-align: center;
  font-size: 15px;
}

.btn-primary {
    background-color: #0ACF5A !important;
}
.col-sm-8
{
  margin-left: 150px;
}
</style>
</head>
<body>
  
<?php 
                if(!empty($_SESSION['id'])) 
                {
                                
                                  include "header.php";    
                        
                }
                else
                {
                 
                     include "headerbeforelogin.php";

                }
                ?>
        <br><br>


  <a class="navbar-brand" href="#"><img src=""></a>
  
 <br>
 <br>
 <br>
 
  <div class="x"><h2><b>FINDING YOUR PERFECT HIKE</b></h2></div>
  <div class="y"><p>We believe hiking has the power to transform lives. 
    <br>Sometimes, finding the perfect hike can be hard.<br> Choosing and planning a hike should be fun, but often <br>the process is frustrating and the information is hard to find.<br> Not anymore!<br>
The Hiking Club is an online platform that turns trail information <br>into a range of personalised, <br>self-guided hikes designed to suit your preferences, fitness and interests.
</p></div>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <img src="skills.jpg" width="700" height="400" class="center">
      <h2>Navigating a Hiking Trail is an Essential Skill</h2>
      <p>Hiking is a relatively safe outdoor adventure. As true as this might be, it is only safe if you are prepared and know how to navigate the Australian bush. A key and critical aspect of your trip preparation is knowing where you are going and being aware of potential emergency evacuation points. The most common cause of ill-fated hiking trips is people getting lost, so it is important to know how NOT to get lost and what to do if this does occur.
      The most direct and honest advice I can offer is if you don’t know how to read a topographic trail map and use a compass, then don’t go hiking. Having someone in your group that knows how to use them is not good enough. Case scenario; you accidentally get separated from the group and the trail seems to have disappeared or is now heading off in a number of directions. What do you do? You really need to start every hike with the knowledge that you are in control of you making it back safely.</p>
      <br>
      <br>
      </div>
      
       <div class="row2">
  <div class="column1" style="width: 400px;">
   <img src="navigation.jpeg" width="400" height="300">
  </div>
  <div class="column2" style="width: 300px;">
    <br>
    <br>
    <br>
    <br>
    <p class="p1">Finding your way by using the Southern Cross Navigating at
       Night need not be as daunting as it sounds. Provided</p>
       <button type="button" onclick="window.location.href='navigationatnight.php'" class="btn btn-primary">Navigation at night</button>
  </div>
</div>
<br>
<br>

<div class="row2">
  <div class="column1" style="width: 400px;">
    <br>
    <br>
    <br>
    <br>
    <p class="p1">How to use a compass for hiking in Australia Using a compass is a life saving skill. Your own life</p>
       <button type="button" onclick="window.location.href='compass.php'" class="btn btn-primary">How to use a compass</button>
  </div>
  <div class="column2" style="width: 300px;">
     <img src="compass.jpg" width="400" height="300">
  </div>
</div>
<br>
<br>
<div class="row2">
  <div class="column1" style="width: 400px;">
   <img src="map.jpg" width="400" height="300">
  </div>
  <div class="column2" style="width: 300px;">
    <br>
    <br>
    <br>
    <br>
    <p class="p1">We’ve got everything you need including personalised itineraries, detailed planning information for easy preparation, and offline GPS maps for confident 
    navigation on the trail. </p>
       <button type="button"  class="btn btn-primary">Self-Guided Hicking</button>
  </div>
</div>
<br>
<br>
<div class="row2">
  <div class="column1" style="width: 400px;">
    <br>
    <br>
    <br>
    <br>
    <p class="p1">Looking for details about travel restrictions, trail status and hiker responsibilities for hiking in the Alps? 
    See how Covid-19 may impact your hiking plans.</p>
       <button type="button" class="btn btn-primary">Impact of Covid-19</button>
  </div>
  <div class="column2" style="width: 300px;">
     <img src="covid.jpg" width="400" height="300">
  </div>
</div>

    
  </div>
</div>

<div class="text-center">
  <div class="container1">
  <footer class="footer">
  <div class="row1">
  <div class="footer-col">
<h4>Company</h4>
<ul>
  <li><a href="#">about us</a></li>
   <li><a href="#">our services</a></li>
    <li><a href="#">privacy policy</a></li>
     <li><a href="#">affiliate program</a></li>
</ul>
</div>
 <div class="footer-col">
<h4>get help</h4>
<ul>
  <li><a href="#"></a></li>
   <li><a href="#"></a></li>
    <li><a href="#"></a></li>
     <li><a href="#"></a></li>
      <li><a href="#">payment options</a></li>
</ul>
</div>
 <div class="footer-col">
<h4>online shop</h4>
<ul>
  <li><a href="items.php"></a></li>
</ul>
</div>

 <div class="footer-col">
<h4>follow us</h4>
<div class="social-links">
  <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-linkedin-in"></i></a>
 </div>
</div>
</div>
</footer>
</div>

</body>
</html>