<?php
session_start();
if(isset($_SESSION["userSN"])){

	$session = $_SESSION["userSN"];
}else{
	$session = "";
}
  

require_once("backend/dbTable.php");

require_once("backend/database.php");

require_once("php/header_footer.php");




// if (isset($_POST["submitBTN"])) {
// 	$name = $_POST["userName"];
// 	$email = $_POST["email"];
// 	$phone = $_POST["phone"];
// 	$message = $_POST["message"];

// 	// form validation in php
// 	if (!$name || !$email || !$phone || !$message) {
// 		// display message if any of the fields  does not have value
// 		if (!$name) {
// 			$error = "Please enter your  Full Name to Contact us";
// 		} else if (!$email) {
// 			$error = "You must provide a valid Email Address to contact us";
// 		} else if (!$phone) {
// 			$error = " please enter your phone number";
// 		} else if (!$message) {
// 			$error = "The message field is mandatory";
// 		}
// 	} else {
// 		$sucess = $name . ", thank you your message has been submitted and we will get 
// 		back to you within 24hrs. Kindly check your email at " . $email . " to ensure you receive an email from us.";
// 	}
// }

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

</head>

<body>


	<?php pageHeader($session, $sarah); ?>

	<div id="page" style="position: relative;">


		<div id="featureImg">
			<img src="images/edited.jpg" style="width: 100%;">
		</div>


		<div id="sidebarCont">

			<div id="sideBar">
				<h3 style="font-size: 14px;">CATEGORY</h3>
				<ul>
					<li><a href="#">Television</a></li>
					<li><a href="#">Head Phone</a></li>
					<li><a href="#">Microwaves</a></li>
					<li><a href="#">Electric Iron</a></li>
					<li><a href="#"> Electric Kettle</a></li>
					<li><a href="#">Rechargeable Fan</a></li>
					<li><a href="#">Electric Blender</a></li>
				</ul>
			</div>
		</div>



		<div id="proDiv">
		<span style="background-color:yellow; width: 10px; height:10px"></span>
			<h4 class="header-title">Most wanted Items</h4>
			
			<?php 
			
				$get = $sarah->query("select *from products order by sn desc");
				if($get->num_rows > 0){
				while($rw = $get->fetch_assoc()){
					
			
			?>

			<div class="itemDiv">
				<a href="viewProduct.php?q=<?php echo $rw["sn"]; ?>" ><img src="product_images/<?php echo $rw["product_file"]; ?>" style="width:90%; height:150px">
					<h6> <?php echo $rw["product_name"]; ?></h6>
					<p class="price"> <?php echo "&#8358;".number_format($rw["product_price"],2); ?> </p>
				</a>

				<!-- <p style="padding:0; ">Add <a href="cart.php" class="cart"><i class="fa fa-cart-plus" style="color: orangered;"></i></a></p> -->

			</div>
			<?php } 
		
			} ?>

			<div style="clear:both;"></div>


		</div>






		<?php pageFooter(); ?>

</body>

<script>
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