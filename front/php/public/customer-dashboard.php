<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/ecommerce_project/config.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/ecommerce_project/session.php"); // Include the session management file

// Logout logic
if(isset($_GET['logout']) && $_GET['logout'] == true) {
    session_destroy();
    header("Location: /ecommerce_project/signin.php"); // Redirect to the login page after logout
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("../views/elements/headdashboard.php"); ?>
</head>
<body>

<div class="container">
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <h2>Your Order History</h2>

    <?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce_project", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $user_id = $_SESSION['user_id'];

        // Select orders along with user email, grand total, and invoice number
        $sql = "SELECT orders.id, orders.title, orders.quantity, orders.grand_total, orders.invoice_number, users.address, users.email FROM orders
                INNER JOIN users ON orders.user_id = users.id
                WHERE orders.user_id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $orders = []; // Initialize $orders to avoid undefined variable warning
    }
    ?>

    <?php if (!empty($orders)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Order ID</th>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Grand Total</th>
                 
                    <th>Invoice Number</th>
                    <th>Delivery Address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['email']); ?></td>
                        <td><?php echo htmlspecialchars($order['id']); ?></td>
                        <td><?php echo htmlspecialchars($order['title']); ?></td>
                        <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($order['grand_total']); ?></td>
                        
                        <td><?php echo htmlspecialchars($order['invoice_number']); ?></td>
                        <td><?php echo htmlspecialchars($order['address']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>You have no orders yet. Why not explore our shop and find something you love?</p>
    <?php endif; ?>

    <!-- Logout button -->
    
    <div style="margin-top: 20px;">
        <a href="http://localhost/ecommerce_project/front/php/public/login.php" style="text-decoration: none; color: red;">Logout</a>
    </div>
</div>
</div>

</body>
</html>
