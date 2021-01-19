<?php

session_start();

session_destroy();

$_SESSION["userSN"] = "";

header("location:login.php");




?>