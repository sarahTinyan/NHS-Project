<?php 
require_once("database.php");


    $sarah->query("CREATE TABLE IF NOT EXISTS products(
        sn int(20) auto_increment NOT NULL,
        product_file varchar(150) NOT NULL,
        product_name varchar(100) NOT NULL,
        product_price varchar(100) NOT NULL,
        product_description longtext,
        primary key(`sn`) 
    )");

    $sarah->query("alter table products add product_category varchar(150) after sn");

    $sarah->query("CREATE TABLE IF NOT EXISTS SignUp_table(
        sn int(20) auto_increment NOT NULL,
        firstname varchar(150) NOT NULL,
        lastname varchar(150) NOT NULL,
        email_address varchar(100) NOT NULL,
        phone_number varchar(100) NOT NULL,
        password varchar(150) NOT NULL,
        primary key(`sn`)
        
    )");

    $sarah->query("CREATE TABLE IF NOT EXISTS cart_table(
        sn int(30) auto_increment NOT NULL,
        user_id varchar(150) NOT NULL,
        product_id varchar(150) NOT NULL,
        purchase_date varchar(50) NOT NULL,
        status varchar(200) NOT NULL,
        primary key(`sn`)

    )");
