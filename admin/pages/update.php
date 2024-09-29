
<?php
$_id = $_POST['id'];
$_title = $_POST['title'];
$_link = $_POST['link'];
$_details = $_POST['details'];


//Connection to Database
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Query

$query = "UPDATE `pages` SET `title` = :title, `link` = :link,`details` = :details
WHERE `pages`.`id` = :id";


$stmt = $conn->prepare($query);


$stmt->bindParam(':id', $_id);

$stmt->bindParam(':title', $_title);
$stmt->bindParam(':link', $_link);
$stmt->bindParam(':details', $_details);

$result = $stmt->execute();

//var_dump($result);
header("location:index.php");
