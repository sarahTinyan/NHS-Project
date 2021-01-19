<?php 

    function pageHeader($session, $db){
        $seccion = strlen($session); 
        if($seccion > 4){
            $temp = 1;
        }
        $w= $db->query("select  *from cart_table where user_id = '$session'");
        $vw = $w->num_rows ;
      
            
    
?>

 
<div id="firstHeader">

<div id="headContact">
    <span>Call us: 08056144805</span><span> Email: info@oraselectronics.com</span>
    
    
    <div class="loginCart">

        <a href="checkout.php" class="cart" style="color: orangered; font-weight:bold; "><i class="fa fa-cart-plus" ></i>cart
        
       <sup style="margin-top: 20px;  margin-left: -5px; position: absolute;  color: white; "><b style=" border-radius: 50%; padding: 1px 8px; background: orangered;"><?php echo $vw; ?></b></sup>
        
    </a>
        <button> 
        <?php if($session !="" && !isset( $temp)){ ?>
            <a href="logout.php" style="color: white;"> logout </a>

       <?php }else{ ?>
        <a href="login.php" style="color: white;">
        Login </a>
       <?php } ?>

    </button>


    </div>

</div>

</div>

<div id="header">
<ul>
    <li><img src="images/loggo.png" alt="logo" id="logo" style="width:80px"></li>
    <li><a href="index.php">Home</a></li>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a href="services.php">Services</a></li>
    <li><a href="contact.php">Contact Us</a></li>
<!-- work on this later -->
    <!-- <div id="searchContainer">

<input type="search" id="searchContent" placeholder="find a product"> 

<button id="searchBTN"><i class="fa fa-search"></i></button>
</div> -->

</ul>



</div>



<?php } 

function pageFooter(){ ?>


    <div id="footer">

    All right reserved &copy; <?php echo date("Y"); ?> ORAS<sup style="color: orangered;">&reg;</sup> Electronic<br>
    <p>Proudly Developed by SarahTech</p>
    </div>





	</div>


<?php } ?>



