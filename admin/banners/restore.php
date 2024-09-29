<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");


use App\Banners;

$_banner=new Banners();
$_banner->restore();
