<?php
$_id=$_GET['id'];
$_is_deleted=1; 


$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="UPDATE `sponsers` SET `is_deleted`=:is_deleted WHERE `sponsers`.`id` = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $_id); 
$stmt->bindParam(':is_deleted', $_is_deleted); 

$stmt->execute();
header("location:index.php");