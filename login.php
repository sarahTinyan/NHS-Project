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



if (isset($_POST["headerLoginBtn"])) {

    $email = $_POST["loginEmail"];

    $pass = $_POST["loginPass"];


    $log = $sarah->query("select *from signup_table where email_address ='$email' and password ='$pass'");
    if ($log->num_rows > 0) {
        $vw =  $log->fetch_assoc();

        // upgrading visitor's session on cart table to logged in user session using the user id column on the cart table.
         
        $getCart = $sarah->query("select * from cart_table where user_id = '$session'");
        if($getCart->num_rows > 0){
$g = $getCart->fetch_assoc();

$sarah->query("update cat_table set user_id = '' where user_id = '' ");

        }

        // $cart = $sarah->prepare("select sn from cart_table where user_id = ?");
        // $cart->bind_param("s",$e);
        // $cart->execute();
        // $cart->store_result();
        // $cart->bind_result($w);
        // $cart->fetch();

        $_SESSION["userSN"] = $vw["sn"];
        
// link to another php  file page
        header("location: dashboard.php");

        // echo "Welcome ".$vw['firstname']. " ". $vw['lastname']; 
        // exit;
       
    }else{
        $error = "Complete all fields to sucessfully login to your account";
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
            div#headerLogin {
                background: whitesmoke;
                padding: 15px;
                padding-bottom: 30px;
            }

            div#headerLogin form {
                border: 1px solid grey;
                box-shadow: 4px 4px 8px grey;
                /* border-top-left-radius: 60px; 
                border-bottom-right-radius: 60px;*/
                width: 35%;
                margin: auto;

            }

            div#headerLogin label {
                margin-left: 15px;
                font-weight: bold;
                padding: 10px;

            }

            div#headerLogin input {
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

            div#headerLogin input#headerlogBtn {
                margin-top: 30px;
                width: 35%;
                background: green;
                color: white;
                font-weight: bolder;
                border: none;
                border-radius: 20px !important;
            }

            div#headerLogin input#headerlogBtn:hover {
                box-shadow: 3px 3px 1px black;
            }

            /* div#headerLogin input#createAcctBtn{ 
                margin-bottom: 30px;
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



        <div id="headerLogin">

            <h3 style="margin-top: 30px; margin-bottom: 20px; text-align:center; color: orangered; font-weight:bold;">Customer Login Portal</h3>

            <form action="login.php" method="POST">

                <?php


                if (isset($error)) { ?>
                    <div style="color:red; font-weight:bold;"> <?php echo $error; ?> </div>

                <?php } else if (isset($sucess)) { ?>
                    <div style="color:green; font-weight:bold;"> <?php echo $sucess; ?> </div>
                <?php
                }
                ?>

                <label>Email Address</label>
                <input type="email" id="eAddress" name="loginEmail" placeholder="Enter Email Adress" value="<?php if(isset($email)){ echo $email; } ?>">
                <label>Password</label>
                <input type="password" id="loginPswd" name="loginPass" placeholder="Enter Password" <?php if(isset($pass)){ echo $pass; } ?>>
                <input type="submit" value="Login" name="headerLoginBtn" id="headerlogBtn">

                <p style="margin-top: 30px; margin-bottom: 10px; text-align:center; font-weight:bolder;">Don't have an Account? <a href="register.php">Sign Up</a></p>
                <!-- <input type="button" value="Create an Account" name="crateAcctBtn" id="createAcctBtn"> -->
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
    </script>  -->

</html>