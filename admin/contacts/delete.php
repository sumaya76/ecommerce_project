<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");

use App\Contacts;

$_contact = new Contacts();
$_contact->delete();