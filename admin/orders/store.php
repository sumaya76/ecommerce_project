
<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");

use App\Orders;

$_order = new Orders();
$_order->store();
