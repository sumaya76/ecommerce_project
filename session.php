<?php

session_start();
include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");
$_SESSION['is_authenticated'] = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecommerce_project";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = $_POST['email'];
        $password = $_POST['password'];
        $redirect = $_POST['redirect'] ?? null;

        $sql = "SELECT id, user_name, email, password, role FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && $result['email'] == $email && $result['password'] === $password) {
            // Store user information in session
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['user_name'];
            $_SESSION['email'] = $result['email'];
            
            $_SESSION['role_id'] = $result['role'];
            $_SESSION['is_authenticated'] = true;

            if ($result['role'] === "admin") {
                $redirect_url = $redirect ? $redirect : './admin/dashboard.php';
            } else {
                $redirect_url = $redirect ? $redirect : './index.php';
            }

            header("Location: $redirect_url");
            exit();
        } else {
            $_SESSION['is_authenticated'] = false;
            header('Location: ./front/php/public/login.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
