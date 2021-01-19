<?php

$host = "localhost";   //assigning the server name to variable host
$dbuser = "root";   //create a variable to handle database username
$dbpass = "";   //database password, empty value for local host user and to be replaced with db password by the user when puting on live server
$dbname = "oras_electronics";  //assigning db name to the variable

$sarah = mysqli_connect($host, $dbuser, $dbpass, $dbname);  //connecting to mysql db object by passing all  the above server credentials as parameter to the object. note: sarah is now the db oject to be used on all the pages

if (!$sarah->connect_errno){   //checking if there is no any error in the above db connection using the not sign (!)
    // echo "connected";
    // exit;
}else{   //display error message if there is error 
    echo "not connected";
}



?>




