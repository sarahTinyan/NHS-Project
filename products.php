<?php
session_start();
if(isset($_SESSION["userSN"])){

	$session = $_SESSION["userSN"];
}else{
	$session = "";
}

require_once("php/header_footer.php");



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
	
	<?php pageHeader($session) ?>

	<div id="page">




		hjsjbfl.dmkzgc;x.kh,.khgas.,hdkvgfjksdflahcnmasdflkjhdslhfjsd;<zaasjlhj class="zdvbddddddddddddd">z\h,jjjjjc,hc\zbvc.</zaasjlhj>





	<?php pageFooter() ?>


	</div>
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