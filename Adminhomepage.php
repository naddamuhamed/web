<?php
session_start();
if($_SESSION['type']!='admin')
header("Location:errorpage.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
.sidenav a, .dropdown-btn {
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
.sidenav a:hover, .dropdown-btn:hover {
  color: #F88306;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
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
.container {
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
	<div class="container">
  <img src="hiking-header.jpg" width="1330px" height="800px">
  <div class="text-block">
  <h1><b>Hiking Club</b></h1>
  <p><b>When life gives you mountains, put on your boots and HIKE..</b></p>
  </div>
</div>
	<div class="sidenav">
  <button class="dropdown-btn">Hikers 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <!-- <a href="Addhiker(admin).php">Add</a> -->
    <a href="tablehiker.php">View</a>
  </div>
  <br>
  <button class="dropdown-btn">Manage other employees 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="addEmployee.php">Add</a>
    <a href="tableEmployee.php">Delete</a>
  </div>
  <br>
  <button class="dropdown-btn">Groups 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="addgroup.php">Add</a>
    <a href="displaygroupstrial.php">Preview</a>
  </div>
  <br>
  <button class="dropdown-btn">Products 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="AddProduct.php">Add</a>
    <a href="tableproducts">preview</a>
  </div>
  <br>
  <a href="messagesadmin.php">Messages</a>
  <br>
  <a href="tableOrders.php">Orders</a>
  <br>
  <a href="logout.php">Logout</a>
</div>

<div class="main">
  
</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>


</body>
</html>