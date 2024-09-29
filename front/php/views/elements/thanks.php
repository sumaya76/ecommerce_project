<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <style>
        .thankyou-wrapper {
            width: 100%;
            height: auto;
            margin: auto;
            background: #ffffff;
            padding: 10px 0px 50px;
        }
        .thankyou-wrapper h1 {
            font: 100px Arial, Helvetica, sans-serif;
            text-align: center;
            color: #333333;
            padding: 0px 10px 10px;
        }
        .thankyou-wrapper p {
            font: 26px Arial, Helvetica, sans-serif;
            text-align: center;
            color: #333333;
            padding: 5px 10px 10px;
        }
        .thankyou-wrapper a {
            font: 26px Arial, Helvetica, sans-serif;
            text-align: center;
            color: #ffffff;
            display: block;
            text-decoration: none;
            width: 250px;
            background: #E47425;
            margin: 10px auto 0px;
            padding: 15px 20px 15px;
            border-bottom: 5px solid #F96700;
        }
        .thankyou-wrapper a:hover {
            background: #F96700;
            border-bottom: 5px solid #F96700;
        }
        .invoice-wrapper {
            width: 80%;
            margin: auto;
            background: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header, .invoice-footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h2 {
            margin: 0;
            color: #333333;
        }
        .invoice-body {
            margin-bottom: 20px;
        }
        .invoice-details {
            width: 100%;
            margin: auto;
            border-collapse: collapse;
        }
        .invoice-details th, .invoice-details td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .invoice-details th {
            background: #f2f2f2;
        }
        .print-button {
            display: block;
            margin: 20px auto;
            width: 200px;
            padding: 10px 20px;
            background: #28a745;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            font-size: 16px;
        }
        .print-button:hover {
            background: #218838;
        }
        /* Hide elements when printing */
        @media print {
            .print-button,
            .back-home {
                display: none;
            }
        }
    </style>
</head>
<body>

<section class="login-main-wrapper">
    <div class="main-container">
        <div class="login-process">
            <div class="login-main-container">
                <div class="thankyou-wrapper">
                    <h1>Thank You!</h1>
                    <p>Your order has been successfully placed</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
try {
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=ecommerce_project", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT users.email, carts.title, carts.quantity, carts.total_price, users.address
                FROM carts
                INNER JOIN users ON carts.user_id = users.id
              
                WHERE carts.user_id = :user_id 
                ORDER BY carts.id DESC 
                LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetching items currently in the user's cart

        // Calculate the grand total
        $grand_total = 0;
        foreach ($orders as $order) {
            $grand_total += floatval($order['total_price']);
        }
    } else {
        echo "User is not logged in.";
        $orders = null;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $orders = null;
}
?>

<?php if ($orders): ?>
    <!-- Displaying details for all orders -->
    <div class="invoice-wrapper" id="invoice">
        <div class="invoice-header">
            <h2>Invoice</h2>
        </div>
        <div class="invoice-body">
            <table class="invoice-details">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Delivery Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['email']); ?></td>
                            <td><?php echo htmlspecialchars($order['title']); ?></td>
                            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($order['total_price']); ?></td>
                            <td><?php echo htmlspecialchars($order['address']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="invoice-footer">
            <p>Grand Total: <?php echo number_format($grand_total, 2); ?></p>
            <p>Thank you for your purchase!</p>
        </div>
    </div>
    <button class="print-button" onclick="printInvoice()">Print Invoice</button>
<?php else: ?>
    <p class="text-center">You have no orders yet. Why not explore our shop and find something you love?</p>
<?php endif; ?>

<div class="thankyou-wrapper">
    <a href="../../public/index.php" class="back-home">Back to home</a>
</div>

<script>
    function printInvoice() {
        var printContents = document.getElementById("invoice").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();

        document.body.innerHTML = originalContents;
        location.reload();  // Reload the page to restore original content after printing
    }
</script>

</body>
</html>
