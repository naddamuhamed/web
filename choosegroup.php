<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM items WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'photo'=>$productByCode[0]["photo"],'description'=>$productByCode[0]["description"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
}
}
?>

<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>choose groups</title>
	<style type="text/css">
   body {
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
	font-family: Arial;
	color: #211a1a;
	font-size: 0.9em;
}
.product-image {
	height: 155px;
	width: 250px;
	background-color: #0ACF5A;
}   

.product-title {
	margin-bottom: 20px;
}  

.product-price {
	float:left;
}
.product-des {
	float:left;
}
#product-grid {
	margin: 30px;
}


.cart-action {
	float: left;
}
.product-tile-footer {
    padding: 15px 20px 0px 10px;
    width:270px ;
	background: #0ACF5A;
    overflow: auto;
}

.txt-heading {
	color: #211a1a;
	border-bottom: 1px solid #E0E0E0;
	overflow: auto;
}

</style>
</head>
<body>
	<?php  include "header.php"; ?>

	<div id="product-grid">
	<div class="txt-heading">Groups</div>
	<?php
	$group_array = $db_handle->runQuery("SELECT * FROM groups ORDER BY id ASC");
	if (!empty($group_array)) { 
		foreach($group_array as $key=>$value){
	?>
		<div class="product-item">
		
			<form method="post" action="items.php?action=add&id=<?php echo $group_array[$key]["id"]; ?>">
						<div class="product-tile-footer">
			<div class="product-image"><img src="<?php echo $group_array[$key]["photo"]; ?>"></div>
		
			<div class="product-title"><?php echo $group_array[$key]["name"]; ?></div>

			<div class="product-price"><?php echo $group_array[$key]["timeslotfrom"]; ?></div>
				<br>
					<div class="product-price"><?php echo $group_array[$key]["timeslotto"]; ?></div>
				<br>
			<div class="product-price"><?php echo "$".$group_array[$key]["price"]; ?></div>
			<br>
			<div class="product-des"><?php echo  $group_array[$key]["location"]; ?></div>
			<br>
	<button type="button" class="btn btn-Success" >Choose group</button>

			</form>
		</div>
	<?php
		}
	}
	?>
</div>


</body>
</html>