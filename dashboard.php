<?php
session_start();

if(!isset($_SESSION["userSN"])){

    header("location:login.php?access_deny");
}else{
    $session = $_SESSION["userSN"];
}

require_once("backend/dbTable.php");

require_once("backend/database.php");

$getSession = $sarah->query("select *from signup_table where sn = '$session'");

if($getSession->num_rows == 0){

session_destroy();

header("location:login.php");

}

$getUser = $getSession->fetch_assoc();
$fn = $getUser["firstname"];
$ln = $getUser["lastname"];
$email = $getUser["email_address"];
$phone = $getUser["phone_number"];
$pass = $getUser["password"];




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

<style>
    div#pgcontainer{
        min-height:1100px; margin-left:25%; margin-right:25%; top:20px; background: white; box-shadow:2px 2px 10px grey; border-radius: 10px; position: relative;
    }




</style>



<body style="background: #ccc">
<style>
    div#pgcontainer .para1{ margin-top: 30px; padding: 0 5px; margin-left: 18%; font-weight: bold; }
    </style>


    <div id="pgcontainer">
        <div style="position: relative;">


            <div style="border-radius: 50%; box-shadow:2px 2px 5px grey; background:whitesmoke; width:15%; height:120px; float:left; margin-top:70px; margin-left:10px;">
        
                <img src="images/girly.jpg" style="width:100%; border-radius:50%; height:120px;">
        </div>
            
            <div class="">
            
                <h3 style="color: orangered; text-align:center; border-bottom:3px solid grey; margin: 20px 30px; text-transform:uppercase;">User Dashboard</h3>
            
               <p class="para1"> Name: <?php echo $fn." ".$ln; ?> <span style="float: right; margin-right:10px; border-radius:5px; background:orangered; padding:5px; margin-top:20px; font-weight:bolder;"><a href="logout.php" style="color:white; text-decoration:none;">Logout</a></span></p>
               
               <p class="para1"> Email: <?php echo $email; ?> </p>
               <p class="para1"> Phone Number: <?php echo $phone; ?> </p>
            
            </div>
           
            <div id="topCon" style="position: relative; top:10px;">
                <div style="box-shadow:2px 2px 5px grey; width:25%; background-color:gray; border-radius:50%; position:absolute; top:80px; margin-left:20px; height:150px;"></div>

                <div style="box-shadow:2px 2px 5px grey; width:30%; position:absolute; left:50%; top:80px; height:150px;"></div>

            </div>

        </div>

        
        

        <div id="proDiv" style="margin-bottom:60px; top:300px; width:100%; left:20px;">
			<h4 class="header-title" style="width: 80%; margin-left:5%;">Most wanted Items</h4>
			
			<?php $get = $sarah->query("select *from products order by sn desc limit 8");
			if($get->num_rows > 0){
				while($rw = $get->fetch_assoc()){
					
					
				
			
			?>
			<div class="itemDiv">
				<a href="viewProduct.php?q=<?php echo $rw["sn"]; ?>" ><img src="product_images/<?php echo $rw["product_file"]; ?>" style="width:90%; height:150px">
					<h6> <?php echo $rw["product_name"]; ?></h6>
					<p class="price"> <?php echo "&#8358;".number_format($rw["product_price"],2); ?> </p>
				</a>

				<p style="padding:0; ">Add <a href="cart.php" class="cart"><i class="fa fa-cart-plus" style="color: orangered;"></i></a></p>

			</div>
			<?php } 
		
			} ?>

			
		

			<div style="clear:both;"></div>


		</div>
    </div>



</body>


</html>