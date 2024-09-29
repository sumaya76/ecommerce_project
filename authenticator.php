<?php

$webroot = "http://localhost/ecommerce_project/";

session_start();

$is_authenticated = $_SESSION['is_authenticated'];

if(!$is_authenticated){
    header("location:".$webroot."404.php");
}
