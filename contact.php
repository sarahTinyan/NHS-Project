<?php
session_start();
if(isset($_SESSION["userSN"])){

	$session = $_SESSION["userSN"];
}else{
	$session = "";
}

require_once("backend/database.php");

require_once("php/header_footer.php");





if (isset($_POST["contactbtn"])) {
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	// $phone = $_POST["phone"];
	$message = $_POST["message"];

// 	// form validation in php
	if (!$fname ||  !$lname ||!$email || !$message) {
// 		// display message if any of the fields  does not have value
		if (!$fname) {
			$error = "Please enter your  First Name to Contact us";
		}else if (!$lname){
			$error = "Please enter your  Last Name to Contact us";
		} else if (!$email) {
			$error = "You must provide a valid Email Address to contact us";
		// } else if (!$phone) {
		// 	$error = " please enter your phone number";
		} else if (!$message) {
			$error = "The message field is mandatory";
		}
	} else {
		$sucess = $fname." ".$lname." "." thank you! Your message has been submitted and we will get 
		back to you within 24hrs. Kindly check your email at " . $email . " for feedback.";
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

</head>

<body>
	<?php pageHeader($session, $sarah); ?>


	<div id="page">
		<style>
			div#contactForm {
				background: white;
				padding: 15px;
				padding-bottom: 30px;
				position: relative;
				height: 900px;
				
			}
			div#formcon{
				width: 70%;
				left: 25%;
				position: absolute;

			}

			div#contactForm #formcon form {
				/* border: 1px solid grey; */
				/* box-shadow: 0 0 5px grey; */
				background: white;
				border-radius: 7px;
				/* border-top-left-radius: 60px; */
				/* border-bottom-right-radius: 60px; */
				width: 45%;
				margin: auto;
				height: 750px;

			}

			div#contactForm #formcon input {
				width: 70%;
				display: block;
				margin-bottom: 5px;
				margin-left: 15px;
				padding: 8px;
				background-color: whitesmoke;
				border: none;
			}

			div#contactForm #formcon label {
				margin-left: 20px;
				font-weight: bold;
				padding: 10px;
			}

			div#contactForm input#contactbtn {
				margin-top: 30px;
				width: 35%;
				background: green;
				color: white;
				font-weight: bolder;
				border: none;
				border-radius: 20px !important;
			}

			div#contactForm input#contactbtn:hover {
				box-shadow: 3px 3px 1px black;
			}

			div#connect {
				position: absolute;
				top: 10px;
				width: 30%;
				height: 250px;
				margin: 350px 30px;
				/* box-shadow: 1px 1px 7px -1px grey; */
				/* border-radius: 5px; */

			}

			div#connect .icons{
				background:black;
				color: orangered;
			}

			div#connect .fa{
				background:black;
				color:orangered;
			}

			div#pageFooter{
				position: absolute;
				width: 100%;
				margin-top:0px;
			}
		</style>

	
<div id="contactForm">
			
			<?php if(isset($error)){ ?>
				<div style="color: red; text-align:center; font-weight:bold;"><?php echo $error; ?></div>
			<?php	}else{
				if(isset($sucess)){ ?>
				<div style="color: green; text-align:center; font-weight:bold;"><?php	echo $sucess; ?> </div>
				<?php } 
			} 
			
			
			?>	

<div id="formcon">
				<h3 style="margin-top: 30px; margin-bottom: 20px; text-align:center; color: orangered; text-shadow: 1px 1px 3px black;">Contact Us:</h3>
				<form action="" method="POST">

					<label>Firstname:</label>
					<input type="text" id="fname" placeholder="firstname" class="input" name="fname" value="<?php if(isset($fname)){ echo "$fname"; }?>">

					<label>Lastname:</label>
					<input type="text" id="lname" placeholder="lastname" class="input" name="lname" value="<?php if(isset($lname)){ echo "$lname";} ?>" >
					<label>Email Address:</label>
					<input type="email" id="fname" placeholder="your email" class="input" name="email" value="<?php if(isset($email)){ echo "$email";} ?> ">

					<label>We are here to answer your questions:</label>
					<textarea placeholder="send a message..." style="background: whitesmoke; width: 80%; height:250px; margin-left:20px; box-shadow:2px 2px 1px -1px;" name="message" value="<?php if(isset($message)){ echo "$message";} ?> "></textarea>

					<input type="submit" value="Submit" name="contactbtn" id="contactbtn" style="background: orangered; color: white; border-radius: 5px; display:block; margin-top:30px; margin-left:20px;">

				</form>
			</div>
		</div>

		<div id="connect">
				<p><a href="call:08056144805" style="font-weight:bold; margin-left:10px"><i class="fa fa-whatsapp fa-lg" aria-hidden="true" class="fa"></i> 08056144805</a></p>
				<p><a href="call:08056144805" style="font-weight:bold; margin-left: 10px"><i class="fa fa-instagram fa-lg" aria-hidden="true" class="fa"></i> oras_electronics</a></p>
				<p><a href="call:08056144805" style="font-weight:bold; margin-left: 10px"><i class="fa fa-facebook fa-lg" aria-hidden="true" class="fa"></i> oras_electronics</a></p>
				<p><a href="email:info@oras.com" style="font-weight:bold; margin-left: 10px">email: info@oraselectronics.com</a></p>



				<p style="text-align: center; font-weight:bold; border-top: 4px solid cadetblue;">:: Connect ::</p>
				<a href="#" class="icons"><i class="fa fa-instagr: fa-lg" aria-hidden="true"></i></a>
				<a href="#" class="icons"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>
				<a href="#" class="icons"><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i></a>
				<a href="#" class="icons"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a>
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