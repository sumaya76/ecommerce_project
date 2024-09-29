
<?php
// Database connection
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce_project', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$today = date('Y-m-d');
$searchQuery = '';

// Check if search form is submitted
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    // Modify the SQL query to filter results based on search query
    $statement = $pdo->prepare("
        SELECT 
            o.id AS order_id, 
            o.product_id, 
            o.title AS product_name, 
            o.quantity, 
            o.grand_total AS unit_price, 
            o.invoice_number AS payment_id,
            p.title AS product_title, 
            p.unit_price AS product_unit_price, 
            p.qty AS product_qty
        FROM 
            orders o 
        JOIN 
            products p 
        ON 
            o.product_id = p.id 
        WHERE 
            DATE(o.created_at) = DATE(NOW()) AND 
            (o.title LIKE :searchQuery OR p.title LIKE :searchQuery)
    ");
    $statement->bindValue(':searchQuery', "%$searchQuery%", PDO::PARAM_STR);
} else {
    // If search form is not submitted, fetch all orders for today
    $statement = $pdo->prepare("
        SELECT 
            o.id AS order_id, 
            o.product_id, 
            o.title AS product_name, 
            o.quantity, 
            o.grand_total AS unit_price, 
            o.invoice_number AS payment_id,
            p.title AS product_title, 
            p.unit_price AS product_unit_price, 
            p.qty AS product_qty
        FROM 
            orders o 
        JOIN 
            products p 
        ON 
            o.product_id = p.id 
        WHERE 
            DATE(o.created_at) = DATE(NOW())
    ");
}

// Execute the query
$statement->execute();
$orders = $statement->fetchAll(PDO::FETCH_ASSOC);

// Check if any orders are found
if (empty($orders)) {
    echo "No orders found for today.";
    exit;
}

// Calculate totals
$total_sales_amount = 0;
$total_quantity_sold = 0;

foreach ($orders as $order) {
    $total_price = $order['quantity'] * $order['unit_price'];
    $total_sales_amount += $total_price;
    $total_quantity_sold += $order['quantity'];
}

// Fetch remaining products and total available
$statement = $pdo->prepare("
    SELECT 
        SUM(qty) as total_available_products 
    FROM 
        products
");
$statement->execute();
$total_available_products = $statement->fetch(PDO::FETCH_ASSOC)['total_available_products'];
?>

<!DOCTYPE html>
<html>
<head>
    <style>
 
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .search-form {
            margin-bottom: 20px;
            text-align: center;
        }
        .search-form input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .search-form button {
            padding: 10px 20px;
            border: none;
            background-color: rebeccapurple;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-form button:hover {
            background-color: darkblue;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .summary {
            margin-top: 20px;
            text-align: center;
        }
        .summary p {
            font-size: 18px;
            color: #555;
        }
        .print-button {
            background-color: rebeccapurple;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
        }
        .print-button:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daily Sales Report for <?php echo $today; ?></h2>

        <form class="search-form" method="GET" action="">
            <input type="text" name="search" placeholder="Search for a product" value="<?php echo htmlspecialchars($searchQuery); ?>">
            <button type="submit">Search</button>
        </form>

        <table>
            <tr>
                <th>Order ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Payment ID</th>
            </tr>

            <?php foreach ($orders as $order): ?>
                <?php $total_price = $order['quantity'] * $order['unit_price']; ?>
                <tr>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['product_id']; ?></td>
                    <td><?php echo $order['product_name']; ?></td>
                    <td><?php echo $order['quantity']; ?></td>
                    <td>৳<?php echo number_format($total_price, 2); ?></td>
                    <td><?php echo $order['payment_id']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="summary">
            <h3>Summary</h3>
            <p>Total Sales Amount: ৳<?php echo number_format($total_sales_amount, 2); ?></p>
            <p>Total Quantity Sold: <?php echo $total_quantity_sold; ?></p>
            <p>Total Available Products: <?php echo $total_available_products; ?></p>
        </div>

        <button class="print-button" onclick="window.print()">Print Report</button>
    </div>
</body>
</html>
