<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");

use App\Admins;

$_admin = new Admins();
$_admin->delete();