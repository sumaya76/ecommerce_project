
<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");


use App\Categories;

$_category=new Categories();
$_category->store();
