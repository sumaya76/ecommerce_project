
<?php
/*echo "<pre>";
print_r($_FILES);
echo "</pre>";
die();*/


$_id = $_POST['id'];
$_title = $_POST['title'];
$_link = $_POST['link'];
$_modified_at = date (" Y-m-d H:i:s" );

if(array_key_exists('is_active', $_POST)){
    $_is_active = $_POST['is_active'];
}else{
    $_is_active = 0;
}


//Connection to Database
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Query

$query = "UPDATE `brands` SET `title` = :title, `link` = :link, `modified_at` = :modified_at , `is_active` = :is_active
WHERE `brands`.`id` = :id";


$stmt = $conn->prepare($query);


$stmt->bindParam(':id', $_id);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':link', $_link);


$stmt->bindParam(':modified_at', $_modified_at);
$stmt->bindParam(':is_active', $_is_active);
$result = $stmt->execute();

//var_dump($result);
header("location:index.php");
