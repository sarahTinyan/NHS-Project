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


if (isset($_POST["createAcctBTN"])) {
    $fn = $_POST["name1"];
    $ln = $_POST["name2"];
    $email = $_POST["emailAdd"];
    $phn = $_POST["phNum"];
    $pwd = $_POST["createPswd"];

    if (!$fn || !$ln || !$phn) {
        $error = "Please complete all the fields in the form";
    } else if (!$email) {
        $error = "Enter a valid email that contains '@' and '.com'";
    } else if (!$pwd) {
        $error = "The password field is mandatory";
    }
    if (!isset($error)) {



        if ($sarah->query("insert into SignUp_table(firstname, lastname, email_address, phone_number, password)values('$fn','$ln','$email','$phn','$pwd')")) {

            $sucess = "Thank you " . $fn . " " . $ln . "! You have sucessfully submitted your details.";
        } else {

            $error = $sarah->error;
        }
    }
}

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
    <!-- <link rel="stylesheet" href="jquery.js"> -->
    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="js/oras.js"></script>

</head>

<body>

    <?php pageHeader($session, $sarah); ?>


    <div id="page">

        <style>
            div#createAccount {
                background: whitesmoke;
                padding: 15px;
                padding-bottom: 30px;
            }

            div#createAccount form {
                border: 1px solid grey;
                box-shadow: 0 0 5px grey;
                background: white;
                border-radius: 7px;
                /* border-top-left-radius: 60px; */
                /* border-bottom-right-radius: 60px; */
                width: 35%;
                margin: auto;
                height: 750px;

            }

            div#createAccount label {
                margin-left: 20px;
                font-weight: bold;
                padding: 10px;

            }

            div#createAccount input {
                width: 70%;
                display: block;
                margin-bottom: 5px;
                margin-left: 15px;
                padding: 8px;
                background-color: whitesmoke;
                border: none;
                /* border-radius: 10px;
                box-shadow: 1px 1px 5px grey; */
            }

            div#createAccount input#createAcctBTN {
                margin-top: 30px;
                width: 35%;
                background: green;
                color: white;
                font-weight: bolder;
                border: none;
                border-radius: 20px !important;
            }

            div#createAccount input#createAcctBTN:hover {
                box-shadow: 3px 3px 1px black;
            }

            /* div#createAccount input#crateAcctLoginBtn{ 
                margin-bottom: 20px;
                width: 35%;
                background: green;
                color: white;
                font-weight: bolder;
                border-radius: 20px !important;
                margin-bottom: 20px;
                margin-left: 150px;
                border: none;
                
            }

            div#headerLogin input#createAcctBtn:hover{ box-shadow: 3px 3px 1px black; }*/
        </style>



        <div id="createAccount">


            <?php

            if (isset($error)) { ?>
                <div style="color: red; font-weight:bold; text-align:center;"> <?php echo $error ?> </div>;
            <?php
            } else if (isset($sucess)) { ?>
                <div style="color: green; font-weight:bold; text-align:center;"> <?php echo $sucess ?> </div>;
            <?php }

            ?>


            <h3 style="margin-top: 30px; margin-bottom: 20px; text-align:center; color: orangered; font-weight:bold;">Create an Account</h3>

            <form action="register.php" method="POST">
                <label>First Name</label>
                <input type="text" id="name1" name="name1" placeholder="First Name" value="<?php if(isset($fn)){ echo $fn; } ?>">
                <label>Last Name</label>
                <input type="text" id="name2" name="name2" placeholder="Last Name" value="<?php if(isset($ln)){ echo $ln; } ?>">
                <label>Email Address</label>
                <input type="email" id="emailAdd" name="emailAdd" placeholder="Enter Email Adress" value="<?php if(isset($email)){ echo $email; } ?>">
                <label>Phone Number</label>
                <input type="text" id="phNum" name="phNum" placeholder="Enter Phone Number" value="<?php if(isset($phn)){ echo $phn; } ?>">
                <label>Password</label>
                <span id="seeP" style="cursor:pointer; color:#069;">See</span>
                <input type="password" id="createPswd" name="createPswd" placeholder="Enter Password" value="<?php if(isset($pwd)){ echo $pwd;} ?>">
                <input type="submit" value="Sign Up" name="createAcctBTN" id="createAcctBTN">

                <p style="margin-top:30px; margin-bottom:10px; text-align:center; font-size:14px;">By creating an account, you accept our <a href="">terms and conditions & privacy policy</a></p>

                <p style="margin-top: 30px; margin-bottom: 10px; text-align:center; font-weight:bolder;">Already have an Account? <a href="login.php">Login here</a></p>
                <!-- <input type="button" value="Login" name="crateAcctLoginBtn" id="crateAcctLoginBtn"> -->
            </form>
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

<script>
var sC = document.getElementById("seeP").addEventListener("click", function(){
    var p = document.getElementById("createPswd").getAttribute("type");
    if(p === "password"){
        document.getElementById("createPswd").setAttribute("type","text");
    }else{
        document.getElementById("createPswd").setAttribute("type","password");
    }
});
</script>
</html>