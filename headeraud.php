<?php
session_start();
if($_SESSION['type']!='auditor')
header("Location:errorpage.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>auditor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style>
        body {
  font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #0ACF5A;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a{
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover {
  color: #F88306;
}

/* Main content */
.main {
  margin-left: 295px; /* Same as the width of the sidenav */
  font-size: 15px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}


/* Add an active class to the active dropdown button */
.active {
  background-color: black;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.container3 {
position: relative;
}

/* Bottom right text */
.text-block {
  position: absolute;
  top:60px;
  right:8px;
  left:10px ;
  color: black;
  padding-left: 20px;
  padding-right: 20px;
  font-size: 5000;
  text-align: center;
}
 </style>

</head>
<body>
  
    <div class="container3">



    <div class="sidenav">
     <li><a href="sendinv.php">Investigation Request</a></li>
<br>
  
   <li><a href="auditormsg2.php">Messages</a></li>
  <br>
 <li><a href="survey2.php">Survey</a></li>
  <br>
  <li><a href="survey response2.php">View Survey Response</a></li>
  <li>
    <a href="logout.php">Logout</a></li>
  

</div>
</div>
</body>
</html>
