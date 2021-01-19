<?php
session_start();
if(isset($_SESSION["userSN"])){

	$session = $_SESSION["userSN"];
}else{
	$session = "";
}

require_once("backend/database.php");

require_once("php/header_footer.php");


?>







<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Welcome to ORAS Electronic store</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.theme.min.css">
	<link rel="stylesheet" href="jquery.js">
	<script src="js/oras.js"></script>
	<link rel="stylesheet" href="css/stylesheet.css">

</head>

<body>

	<?php pageHeader($session, $sarah); ?>


	<div id="page" style="height:800px;">

		<div id="serviceCon" style="background: whitesmoke; height:800px; margin-left:100px; margin-right:100px; padding-top:30px; padding-left:20px;">

			<h2 style="box-shadow: 1px 1px 5px -2px; text-align: center;">ORAS<sup style="color: orangered;">&reg;</sup> Electronic Store</h2>

			<p style="padding-top:10px;">Buy Electronics on <b style="color: orangered;"><em>ORAS</em></b> at the best prices in Nigeria.
				Grab amazing deals on Electronics, and more quality products on <a href="">oras.com</a> <br><b style="color: orangered;"><em>ORAS</em></b> is the Best Online Shopping Store in Nigeria.
				Order now & pay on delivery! <b>24/7</b> Service. 7-Day Free Returns. Super Fast Delivery. Best Quality Always.</p>
			<hr>


			<h5 style="font-weight: bold;">Our Services:</h5>


			<p><b style="color: orangered;"><em>ORASpay</em></b> was launched as a pilot product in 2015 in partnership with Nigerian commercial banks in order to work for customers only within the oras.com's platform.<br>
				The challenge of lack of trust in making online payment was quenched by <b style="color: orangered;"><em>ORASpay</em></b> that has made it possible for anyone to use ORAS's online platform.<br> This innovation had protected online shoppers against the reports of fraud when they release their bank details online. KongaPay has become the game-changer <br>in the online shopping in Nigeria. This is because it has made possible for a seamless movement of goods, services and payments. This has grown safety and trust among ORAS's users.

			</p>

			<p><b style="color: orangered;"><em>ORAS Express</em></b>
				To make its online integration very effective, this service will help to reach the buyer with every available means. Customers can have their ordered products get <br>to them within 1–3 days. ORAS Express fulfills the orders that are made daily with online tracking.<br>
				You can trust us on quality products, our delivery services, 24/7 top-nptch customer service and any other services applicable to our brand..
			</p>
		</div>

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