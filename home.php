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

	
	<div id="page">
		

	<div id="featureImg">
		 <img src="images/pic.jpg" style="width: 100%"> 
	</div>
	
	<div id="sidebarCont">
		
		<div id="sideBar">
			<h3 style="font-size: 14px;">CATEGORY</h3>
			<ul>
				<li><a href="#">Television</a></li>
				<li><a href="#">Head Phones</a></li>
				<li><a href="#">Microwaves</a></li>
				<li><a href="#">Electric Iron</a></li>
				<li><a href="#">Kettles</a></li>
				<li><a href="#">Rechargeable Fans</a></li>
			</ul>
		</div>
		

		<div id="proDiv">
			<h4 class="header-title">Most wanted Items</h4>
			<div class="itemDiv">
				<a href="viewProduct.php?p=deLonghi.jpg"><img src="images/deLonghi.jpg" style="width:90%; height:150px">
				<h6>DeLonghi Microwave</h6><p class="price">Price: NGN60,000</p></a>
			</div>
			<div class="itemDiv">
				<a href="viewProduct.php?p=flatscreen.jpg"><img src="images/flatScreen.jpg" style="width:90%; height:150px">
				<h6>Samsung Flat Screen TV</h6><p class="price">price: NGN170,000</p></a>
			</div>
			<div class="itemDiv">
				<a href="viewProduct.php?p=QasaRechargeableFan.jpg"><img src="images/QasaRechargeableFan.jpg" style="width:90%; height:150px">
				<h6>Qasa rechargeable fan</h6><p class="price">price: NGN30,000</p></a>
			</div>
			<div class="itemDiv"><a href="viewProduct.php?p=saishoBlender.jpg"><img src="images/saishoBlender.jpg" style="width:50%; height:150px">
				<h6>Saisho Blender</h6><p class="price">Price: NGN35,000</p></a>
			</div>
			<div class="itemDiv"><a href="viewProduct.php?p=blueSealIron.jpg"><img src="images/blueSealIron.jpg" style="width:90%; height:150px">
				<h6>Blue Seal Iron</h6><p class="price">price: NGN7,000<</p></a>
			</div>
			<div class="itemDiv"><a href=""><img src="images/electric blender/food processor.jpg" style="width:90%; height:150px">
				<h6>Food Processor</h6><p class="price">price: NGN55,000</p></a>
			</div>
			<div class="itemDiv"><a href=""><img src="images/soundSystem.jpg" style="width:90%; height:150px">
				<h6>Home Thaeter</h6><p class="price">price: NGN90,000</p></a>
			</div>
			<div class="itemDiv"><a href=""><img src="images/electric kettle/kitchen Cartoon.jpg" style="width:90%; height:150px">
				<h6>Electric Kettle</h6><p class="price">Price: NGN25,000</p></a>
			</div>
		</div>
			
		</div>
		
	</div>
	
<div id="footer">
	<p><a href="call:08056144805"><i class="fa fa-whatsapp fa-lg" aria-hidden="true"></i> 08056144805</a></p>
	
	<ul>
	
		<li class="icons"><a href="#"><i class="fa fa-skype fa-lg" aria-hidden="true"></i></a></li>
		<li class="icons"><a href="#"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a></li>
		<li class="icons"><a href="#"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a></li>
		<li class="icons"><a href="#"><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i></a></li>
		<li class="icons"><a href="#"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li>
	</ul>
	phone number, email, facebook, Instagram, Twitter, copyright.
	</footer>
	
</div>	
	
</body>
<script>
	
	
	document.getElementById("searchBTN").addEventListener("click", function(){ 
		
		var context = document.getElementById("searchContent");
		
		if(context.value){
			window.location.href="search.php?sarah="+context.value;
		}else{
			alert(" its a lie");
		}
	
	});
	
</script>
</html>
