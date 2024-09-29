<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");

use App\OrderNotifications;

session_start();

// Check if the user is authenticated
if (!isset($_SESSION['is_authenticated'])) {
    header('Location: ./front/php/public/login.php');
    exit();
}

// Check if order ID is provided
if (!isset($_POST['order_id'])) {
    die("Order is confirmed.");
}

$order_id = $_POST['order_id'];

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_project"; // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update order status to confirmed
$stmt = $conn->prepare("UPDATE orders SET status = 'confirmed' WHERE id = ?");
$stmt->bind_param("i", $order_id);
$stmt->execute();

$stmt->close();
$conn->close();

header("location:confirm_order.php");
exit();
?>
