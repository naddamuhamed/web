<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
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
	
#shopping-cart {
	margin: 40px;
}

.txt-heading {
	color: #211a1a;
	border-bottom: 1px solid #E0E0E0;
		font-size: 2em;

}

#btnEmpty {
		background-color: #F88306;
	border: #d00000 1px solid;
	padding: 5px 10px;

	float: right;

	border-radius: 3px;
	margin: 10px 0px;
}

.tbl-cart {
	font-size: 15px;
}

.tbl-cart th {
	font-weight: normal;
}

.cart-item-image {
	width: 30px;
    height: 30px;
    border-radius: 50%;
    border: #E0E0E0 1px solid;
    padding: 5px;
    vertical-align: middle;
    margin-right: 15px;
}
.no-records {
	text-align: center;
	clear: both;
	margin: 38px 0px;
}

#shopping-cart table {
	width: 1200px;
	background-color: #F0F0F0;
}

.clear-float {
	clear: both;
}
mark{
	background-color: white ;
	color: black;
}
th{
background-color:#037F28;
height: 30px;
} 
td
{
  background-color:#0ACF5A;
}
.btn
{
	float: right;
	background-color: #F88306;
}
</style>
</HEAD>
<BODY>
	<?php  include "header.php"; ?>
<div id="shopping-cart">


<div class="txt-heading"><mark>Shopping Cart</mark></div>

<br>
<br>
<a id="btnEmpty" class="text-warning" href="cart.php?action=empty">Empty Cart</a>
<br>
<br>
<button type="button"onclick="window.location.href='receipt.php'" class="btn">Go to purchase</button>

<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["photo"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records"><mark>Your Cart is Empty</mark></div>
<?php 
}
?>
</div>

</BODY>
</HTML>