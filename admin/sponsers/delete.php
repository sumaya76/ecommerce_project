<?php
$_id=$_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="DELETE FROM sponsers WHERE `sponsers`.`id` = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $_id); 
$stmt->execute();
header("location:index.php");