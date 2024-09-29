
<?php
$_id = $_POST['id'];
$_namecategory = $_POST['namecategory'];
$_passwordlogin = $_POST['passwordlogin'];

//Connection to Database
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Query

$query = "UPDATE `logins` SET `namecategory` = :namecategory, `passwordlogin` = :passwordlogin
WHERE `logins`.`id` = :id";


$stmt = $conn->prepare($query);


$stmt->bindParam(':id', $_id);


$stmt->bindParam(':namecategory', $_namecategory);
$stmt->bindParam(':passwordlogin', $_passwordlogin);

$result = $stmt->execute();

//var_dump($result);
header("location:index.php");
