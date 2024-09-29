
<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");

use App\Feedbacks;

$_feedback = new Feedbacks();
$_feedback->delete();
