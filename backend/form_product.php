<?php

 
require_once("database.php");

if (isset($_POST["formbtn"])) {

    $error = array();


    // html form handler
    $file = $_FILES["file"]["name"];
    $pn = $_POST["pName"];
    $pp = $_POST["pPrice"];
    $pc = $_POST["pCtategory"];
    $pd = $_POST["pDescription"];
    if (!$file || !$pn || !$pp || !$pc || !$pd) {
        $error[] = "please, complete the form to upload products";
    }
    // to handle the files/images
    if ($file) {
        // acceptable file extension will be stored in allow_ext array variable.
        $allow_ext = array("jpg", "png");
        // the default file path extension to be compared with allowed extension.
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        // echo $allow_ext;
        // checking if the path extension is allowed by using a conditional statement.
        if (!in_array($extension, $allow_ext)) {
            $error[] = "Your selected File type is not allowed, please upload in jpg or png file";
        } else {
            // default image path
            $directory = "../product_images";
            // checking if the directory is not existing in the root folder.
            if (!is_dir($directory)) {
                // if it's not existing then create a folder.
                mkdir("$directory", 0755, true);
            }
            // assigning image to the directory
            $renameImage = date("Ymdgis") . $file;
            $directory = $directory . "/" . $renameImage;
            // uploading image from the original source to the server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $directory)) {
            } else {
                $error[] =  "not sucessfully moved";
            }
        }
    } else {
        $error[] =  "no file is selected";
    }

    if (count($error) == 0) {


        if($sarah->query("insert into products(product_category, product_file, product_name, product_price, product_description)values( '$renameImage','$pn','$pp','$pc','$pd')")){

            $sucess = "you have sucessfully uploaded ".$pn;
            
        } else {
            $sucess = $sarah->error;
            
        }
    }
}
?>













<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ORAS Backend</title>
</head>

<style>
    div#formContain {
        box-shadow: 1px 1px 7px -1px cadetblue;
        position: relative;
        margin: 0 10%;
        height: 600px;
    }

    #formP {
        position: absolute;
        width: 50%;
        background: white;
        height: 538px;
    }

    div#formP .input {
        width: 60%;
        background: whitesmoke;
        border: none;
        box-shadow: 1px 1px 2px -1px cadetblue;
        border-radius: 5px;
        padding: 10px;
        margin-top: 10px;
        margin-left: 10px;
        margin-bottom: 10px;
    }

    div#formP #textarea {
        height: 150px;
    }

    div#formP #formPbtn {
        margin-top: 20px;
        margin-left: 20px;
        width: 120px;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 1px 1px 8px -1px cadetblue;
        background: skyblue;
        color: white;
        cursor: pointer;
        font-weight: bolder;
        font-size: 18px;
    }

    div#formP #formPbtn:hover {
        background: whitesmoke;
        color: black;
    }

    #preview {
        position: absolute;
        width: 50%;
        background: whitesmoke;
        height: 538px;
        left: 50%;
    }
</style>

<body>


    <div id="formContain">
        <h3 style="padding: 10px; margin-left:10px;">PRODUCT FORM</h3>
        <div id="formP">
            <?php
            if (isset($error) && count($error) > 0) {
                for ($i = 0; $i < count($error); $i++) { ?>
                   
                    <p style="color:red;"><?php echo $error[$i]; ?> </p>
           
             <?php  }
				
				
            }else if(isset($sucess)){ ?>
				
				<p style="color: green;"><?php echo $sucess; ?> </p>
				
			<?php } ?>
           
           
           
          
           
           
            <form action="" method="POST" enctype="multipart/form-data">

                <input type="file" id="" name="file" style="margin-left: 10px; margin-bottom:10px;">
                <input type="text" id="" class="input" placeholder="product name" name="pName">
                <input type="text" id="" class="input" placeholder="product price" name="pPrice"><br>
                
                <label style="margin-left:10px;"> Product Category:</label><br>
                <select  name="services" id="services" class="input" name="pCtategory">
                    <option value="Television" class="input"> Television </option>
                    <option value="Head Phone" class="input">Head Phone</option>
                    <option value="Microwave" class="input">Microwave</option>
                    <option value="Electric Iron" class="input">Electric Iron</option>
                    <option value="Rechargeable Fan" class="input">Rechargeable Fan</option>
                    <option value="Blender" class="input">Blender</option>    
                </select>

                <textarea id="textarea" class="input" placeholder="product description" name="pDescription"></textarea><br>
                <button name="formbtn" id="formPbtn">Submit</button>

            </form>

        </div>



        <div id="preview">

            <h3 style="padding: 10px; margin-left:10px; text-align:center; font-size: 20px">Preview</h3>

            <div id="divider" style="margin: 0 30px; height:3px; background:cadetblue"></div>

        </div>




    </div>










</body>

</html>