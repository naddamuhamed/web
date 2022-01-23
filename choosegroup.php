<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM groups WHERE code='" . $_GET["code"] . "'");
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
	
	font-size: 0.9em;
}
#product-grid {
	margin: 40px;
}

.txt-heading {
	color: #211a1a;
	
	font-size: 2em;
}

.btnAddAction {
    padding: 5px 10px;
    margin-left: 5px;
    background-color: #F88306;
    border: #E0E0E0 1px solid;
    color: #211a1a;
    float: right;
    text-decoration: none;
    border-radius: 3px;
    cursor: pointer;

}

#product-grid .txt-heading {
	margin-bottom: 18px;
}

.product-item {
	float: left;
	background: #0ACF5A;
	margin: 30px 30px 0px 0px;
	margin-bottom: 50px;
}

.productimg {

    overflow: hidden;
    margin: 20px;
   
  border: 5px solid #F88306;

  padding: 3px;
}

.product-title {
	margin-bottom: 20px;
}

.product-price {
	float:left;
}
.product-des {
	float:right;
}

.cart-action {
	float: right;
}

.product-quantity {
    padding: 5px 10px;
    border-radius: 3px;
    border: #E0E0E0 1px solid;
}

.product-tile-footer {
    padding: 15px 15px 0px 15px;
	background: #0ACF5A;
    width: 380px;
    height: 370px;
    margin-bottom: 60px;
}
mark{
	background-color: white ;
	color: black;
}
.cartbutton
{
	background-color: #F88306;
	height: 50px;
	width: 100px;
	float: left;
}
</style>
</head>
<body>
	<?php  include "header.php"; ?>

	<div id="product-grid">
	<div class="txt-heading"><mark>Groups</mark></div>
	<?php
	$group_array = $db_handle->runQuery("SELECT * FROM groups ORDER BY id ASC");
	if (!empty($group_array)) { 
		foreach($group_array as $key=>$value){
	?>
		<div class="product-item">
		<div class="product-tile-footer">
			<form method="post" action="items.php?action=add&id=<?php echo $group_array[$key]["id"]; ?>">
						
			<div class="productimg"><img src="<?php echo $group_array[$key]["photo"]; ?>" width="300px" height= "170px" >
<script type="text/javascript">
   $("#profileImage").click(function(e) {
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

</script>

			</div>
		
			<div class="product-title"><?php echo $group_array[$key]["name"]; ?></div>

			<div class="product-price"><?php echo $group_array[$key]["timeslotfrom"]; ?></div>
				<br>
					<div class="product-price"><?php echo $group_array[$key]["timeslotto"]; ?></div>
				<br>
			<div class="product-price"><?php echo "$".$group_array[$key]["price"]; ?></div>
			<br>
			<div class="product-des"><?php echo  $group_array[$key]["location"]; ?></div>
			<br>
	<button type="button" class="cartbutton" >Choose group</button>
</div>
			</form>
		
		</div>
	<?php
		}
	}
	?>
</div>


</body>
</html>