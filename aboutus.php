<?php
session_start();
if(isset($_SESSION["userSN"])){

	$session = $_SESSION["userSN"];
}else{
	$session = "";
}
require_once("backend/database.php");

require_once("php/header_footer.php")


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
	<script src="jquery.js"></script>
	<script src="js/oras.js"></script>
	<link rel="stylesheet" href="css/stylesheet.css">

</head>

<style>
	div#aboutus h2{
		text-align:center; 
		margin-top:15px; 
		box-shadow: 2px 6px 3px -2px #999; 
		border-radius: 5px; 
		font-weight: bold;
		
		
	}
</style>

<body>
	<?php pageHeader($session, $sarah); ?>


	<div id="page" style="height:800px;">
		<div id="aboutus" style="background: whitesmoke; height:800px; margin-left:100px; margin-right:100px; padding-top:30px;  padding-left:20px; width:60%;">
			<h2 style="text-align:left; margin-left:30px;">ORAS<sup style="color: orangered;">&reg;</sup> Electronic Store</h2> 

			<p style="margin:20px;">
				<em><b>ORAS</b></em> is an <a href="">online Marketplace</a> in Nigeria that is specialized in the sales of electronic products from major brands such as<br> 
				SAMSUNG, ROYAL, PHILIPS, LG, APPLE, and PANASONIC. The company has such brands in home appliances, office appliances,<br> computers, accessories, among others.<br><br>
				We also offer delivery services which enables the deliveries of purchased items from our online store to consumers.<br>
				<em><b>ORAS</b></em> was incorporated in March 2019. <em><b>ORAS</b></em> is presently online but we look forward to having a presence in the nearest future.
				<br>
				The company has such brands in home appliances, office appliances, computers, accessories, among others.<br><br>
				We also offer delivery services which enables the deliveries of purchased items from our online store to consumers.<br>
				<em><b>ORAS</b></em> was incorporated in March 2019. <em><b>ORAS</b></em> is presently online but we look forward to having a presence in the nearest future.
				<br>
				The company has such brands in home appliances, office appliances, computers, accessories, among others.<br><br>
				We also offer delivery services which enables the deliveries of purchased items from our online store to consumers.<br>
				<em><b>ORAS</b></em> was incorporated in March 2019. <em><b>ORAS</b></em> is presently online but we look forward to having a presence in the nearest future.
		
			</p>
		</div>
		
	</div>	

	

	<?php pageFooter(); ?>

</body>
<!-- <script> 
	document.getElementById("searchBTN").addEventListener("click", function() {

		var context = document.getElementById("searchContent");

		if (context.value) {
			window.location.href = "search.php?sarah=" + context.value;
		} else {
			alert(" its a lie");
		}

	});
</script>-->

</html>