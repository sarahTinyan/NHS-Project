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



if(isset ($_GET["del"])){
    $del = $_GET["del"];


$sarah->query("delete from cart_table where sn = '$del'");

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



<div>
   
<table border="1"  style="width: 60%; margin-left: 20%; margin-right: 20% !important; margin-top: 20px; margin-bottom:30px;">
<tr>
    <th colspan="6" style="padding-left: 10px; background: whitesmoke;"> <h4 style="text-align: left; margin-top: 10px;">ORDER REVIEW</h4></th>
</tr>
    <tr>
        <th  style="padding: 10px;">S/N</th>
        <th  style="padding: 10px;">Product</th>
        <th  style="padding: 10px;">Quantity</th>
        <th  style="padding: 10px;">Unit Price</th>
        <th  style="padding: 10px;">Total Price</th>
        <th  style="padding: 10px;">Remove Item</th>
    </tr>

    <?php
    $checkout = $sarah->query("select *from cart_table where  user_id = '$session'");
if($checkout->num_rows > 0) { 
    $i = 0;
    $sum = 0;

    while($tm = $checkout->fetch_assoc() ){   $i++;
    $PID =  $tm["product_id"];
       
       
       
        $getProduct = $sarah->query("select *from products where  sn = '$PID'");
        $product = $getProduct->fetch_assoc();


        $unitP = $product["product_price"];
        $totalP = ($tm["quantity"] * $product["product_price"]);
        $sum = ($sum + $totalP);
        
    ?>

        <tr>
        <td  style="padding: 10px;"><?php echo $i; ?></td>
        <td  style="padding: 10px;"><?php echo $product["product_name"]; ?></td>
        <td  style="padding: 10px;"><?php echo $tm["quantity"]; ?></td>
        <td  style="padding: 10px;">&#8358;<?php echo number_format($unitP,2); ?></td>
        <td  style="padding: 10px;">&#8358;<?php echo number_format($totalP,2); ?></td>
        <td  style="padding: 10px;"><a href="?del=<?php echo $tm["sn"]; ?>"><button>Delete </button></a></td>
    </tr>
<?php } ?>

<tr>
        <td colspan="4" style="padding: 10px; font-weight: bold; color: green; text-align:right;"><h4>Total Price:</h4></td>
        <td style="padding: 20px; font-weight: bold; color: green;">&#8358; <?php echo number_format($sum,2); ?><br><a href="?pay=2"><button style="margin-top: 5px;">Proceed to Payment</button></a></td>
        <td></td>
</tr>


<?php }else{  ?>
    <tr>
        <td colspan = "6" style="text-align: center;;">
        <h5 style="color: green;">There is no more item to delete in your cart.<h5>
    </td>
    </tr>

    <?php } ?>

    
            


</table>


</div>

<style>
    #bill input{ padding: 5px; margin: 10px; width: 35%; border: none; }

    #payBTN{ width: 30% !important; padding: 10px; color: green; font-weight: bolder; border: 2px solid grey !important; }

    #payBTN:hover{ color: white; background: green;}

</style>

<?php   
    if (isset($_GET["pay"])){
        
        

?>

<div id="bill" style="width: 50%; background:whitesmoke; margin-right:20%; margin-left:20%;">
<form action="" method="" enctype="multipart/form-data">

    <h4 style="box-shadow: 1px 1px 3px grey; text-align: center;">Billing Form</h4><br>
    <input type="text" id="" name="" placeholder="Firstname">
    <input type="text" id="" name="" placeholder="Lastname"><br>
    <input type="password" id="" name="" placeholder="Password"><br>
    <input type="text" id="" name="" placeholder="Billing Address"><br>
    <a href=""><img src= "images/pay.png" width="30%"></a><br>
    <input type="text" id="" name="" placeholder="Card Number">
    <input type="text" id="" name="" placeholder="CVV">
    <input type="text" id="" name="" placeholder="Expiry Date: mm / yy"><br>
    <input type="submit" id="payBTN" name="" value="Make Payment" >


</form>

</div>

    <?php } ?>



    <?php pageFooter(); ?>


</body>

</html>