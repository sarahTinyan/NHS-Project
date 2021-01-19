<?php
session_start();
if(isset($_SESSION["userSN"])){

	$session = $_SESSION["userSN"];

}else{

	$_SESSION["userSN"] = date("Ymdgis");
	$session =  $_SESSION["userSN"];

}

	require_once("backend/database.php");

	

	$sarah->query("alter table cart_table add quantity varchar(100) not null after sn");
	
	require_once("php/header_footer.php");


	if(isset($_POST["add2Cart"])){
		// echo $_POST["userID"];
		if(isset($_POST["quantity"]) && $_POST["quantity"] > 0){     //to check if the quantity element has value and the value is greater than zero
			$uID = $_POST["userID"];
			$proID = $_POST["proID"];
			$quantity = $_POST["quantity"];
			$date = date("Y-m-d g:i:s A", strtotime("+2 hours"));  //to set time restrictions .....strtotime("+3 hours", +2 months, +1 week
			$status = "unpaid";

		
			$sarah->query("insert into cart_table(user_id, product_id, quantity, purchase_date, status )values( '$uID','$proID','$quantity', '$date','$status')");

			

		}



	}
	


?>


<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Welcome to ORAS Electronic store</title>
	<link rel="stylesheet" href="css/stylesheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.theme.min.css">
	<link rel="stylesheet" href="jquery.js">
	<script src="js/oras.js"></script>

	
	<style> 
		#negative {
			background-color: red;
			color: white;
		}

		#positive {
			background-color: green;
			color: white;
		}
	</style>

</head>

<body>
<?php
$bag = 0;
$getQty = $sarah->query("select *from cart_table where user_id = '$session' and product_id = '".$_GET["q"] ."'");
if($getQty->num_rows > 0){
	$w = $getQty->fetch_assoc();
	$pid = $w["product_id"];

	if($pid == $_GET["q"]){
 $bag = 1;
 
	}
}


?>


	<?php pageHeader($session, $sarah); ?>

	<div id="page">




		<div id="sidebarCont">

			<div id="sideBar">
				<h3 style="font-size: 14px;">CATEGORY</h3>
				<ul>
					<li><a href="#">Television</a></li>
					<li><a href="#">Head Phones</a></li>
					<li><a href="#">Microwaves</a></li>
					<li><a href="#">Electric Iron</a></li>
					<li><a href="#">Electric Kettle</a></li>
					<li><a href="#">Rechargeable Fans</a></li>
					<li><a href="#">Blender</a></li>
				</ul>
			</div>

			<div id="proDiv">
			<?php 
				$w = $sarah->query("select *from products where sn = '". $_GET["q"]."'");
				$d = $w->fetch_assoc();
				?>
				<div class="productContainer" id="imageContainer">
					<img src="product_images/<?php echo $d["product_file"]; ?>" width="100%">
				</div>


				<div class="productContainer" id="priceContainer">
				<form action="" method="POST" enctype="multipart/form-data">
						<h2> <?php echo $d["product_name"]; ?> </h2>
						<h2> <?php echo "&#8358;".number_format($d["product_price"],2); ?> </h2>
						<h6>Quantity:</h6>
						
						
						<table border="0">
							<tr>

								<td class="tdata">
									<a href=""> <button id="negative">-</button> </a>
								</td>
								<td class="tdata">
									<input id="quantity" type="number" name="quantity" readonly style="width: 40px;" value="1">
								</td>
								<td class="tdata">
								<a href=""><button id="positive">+</button> </a>
								</td>
								<input type="hidden" name="userID" value="<?php  echo $session; ?>">
								<input type="hidden" name="proID" value="<?php echo $d["sn"]; ?>">

							</tr>
						</table>

						<div class="buyBtn">
							<?php if($bag != 1){ ?>  
						<input type="submit" name="add2Cart" id="add2Cart"  value="Add to cart">
						<?php } else{ echo "Item added"; } ?>
						</div>
						</form>

				</div>

			</div>

		</div>

	</div>

	
	<?php pageFooter() ?>
	
</body>

<script>



							var p = document.getElementById("positive"); // positive button handler
							var n = document.getElementById("negative"); // negative button  handler
							var q = document.getElementById("quantity"); /// quantity field handler

							p.addEventListener("click", function(e) { // function to perform positive addition to quantity
								e.preventDefault();
								var quantity = parseInt(q.value) + 1; // add one to the quantity everytime user click on plus sign (positive)

								q.value = quantity; // changing the quantity value to the new user value after every onclick on plus sign (positive)
							});



							n.addEventListener("click", function(e) { // function to perform subtraction to user quantity
								e.preventDefault();

								var quantity = parseInt(q.value) - 1;
								q.value = quantity;
							});
					


	document.getElementById("searchBTN").addEventListener("click", function() {

		var context = document.getElementById("searchContent");

		if (context.value) {
			window.location.href = "search.php?sarah=" + context.value;
		} else {
			alert(" its a lie");
		}

	});

</script>

</html>