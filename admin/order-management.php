<?php
session_start();

// Pagination variables
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 10; // Number of records to display per page

// Check if the user is authenticated
if (!isset($_SESSION['is_authenticated'])) {
    header('Location: ./front/php/public/login.php');
    exit();
}

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

// Handle search
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Construct SQL query
$limit = ($page - 1) * $recordsPerPage;
$whereClause = ' WHERE 1'; // Basic condition to append more conditions later

// If search keyword is provided, construct WHERE clause for searching
if ($search) {
    $keywords = explode(" ", $search);
    $conditions = [];
    foreach ($keywords as $keyword) {
        $keyword = $conn->real_escape_string($keyword); // Escape each keyword
        $conditions[] = "(o.id LIKE '%$keyword%' OR CONCAT(u.first_name, ' ', u.last_name) LIKE '%$keyword%' OR o.grand_total LIKE '%$keyword%' OR o.invoice_number LIKE '%$keyword%' OR o.address LIKE '%$keyword%' OR o.product_id LIKE '%$keyword%' OR o.title LIKE '%$keyword%' OR o.quantity LIKE '%$keyword%')";
    }
    $whereClause .= " AND " . implode(" AND ", $conditions);
}

$orderQuery = "SELECT o.id, CONCAT(u.first_name, ' ', u.last_name) AS customer_name, u.email, u.phone_number, u.address AS customer_address,u.shipping_address AS customer_shipping_address, o.product_id, o.title, o.quantity, o.grand_total, o.invoice_number, o.address AS shipping_address, o.status
               FROM orders o
               INNER JOIN users u ON o.user_id = u.id
               $whereClause
               LIMIT $limit, $recordsPerPage";

// Debug: Output the constructed query
// echo $orderQuery;

$orderResult = $conn->query($orderQuery);
if (!$orderResult) {
    die("Query failed: " . $conn->error);
}

// Get total number of orders for pagination
$totalOrdersQuery = "SELECT COUNT(*) AS total FROM orders o INNER JOIN users u ON o.user_id = u.id $whereClause";
$totalOrdersResult = $conn->query($totalOrdersQuery);
$totalOrders = $totalOrdersResult->fetch_assoc()['total'];
$totalPages = ceil($totalOrders / $recordsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h2 {
            margin-bottom: 20px;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .sidebar {
            width: 240px;
            position: fixed;
            top: 0;
            left: 0;
            height: 50%;
            padding-top: 0; /* Height of the navbar */
            margin-top: 0;
            background-color: white;
        }
        .search-form {
            display: flex;
            align-items: center;
        }

        .search-form input {
            width: 300px;
            margin-right: 10px;
        }

        .table-striped {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .table-striped thead th {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
        }

        .table-striped tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-striped tbody td {
            vertical-align: middle;
            text-align: left;
        }

        .pagination {
            justify-content: center;
        }

        .pagination .page-item.active .page-link {
            background-color: #343a40;
            border-color: #343a40;
        }

        .pagination .page-link {
            color: #343a40;
        }

        .btn-sm {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            margin: 0 2px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        @media (max-width: 768px) {
            .search-form input {
                width: 200px;
            }

            .table-striped thead th, .table-striped tbody td {
                font-size: 0.85rem;
            }
        }

    </style>
</head>
<body>
<?php include_once 'sidebar.php'; ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Orders Management</h2>
            <div class="header-container">
                <form class="search-form" method="GET" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?= htmlspecialchars($search) ?>">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </form>
            </div>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Customer Details</th>
                        <th>Product Details</th>
                        <th>Invoice Number</th>
                        <th>Status</th>
                        <th>Paid Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $orderResult->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($row['customer_name']); ?><br>
                                Email: <?= htmlspecialchars($row['email']); ?><br>
                                Phone: <?= htmlspecialchars($row['phone_number']); ?><br>
                                Address: <?= htmlspecialchars($row['customer_address']); ?><br>
                                Shipping Address: <?= htmlspecialchars($row['customer_shipping_address']); ?>
                            </td>
                            <td>
                                Product ID: <?= htmlspecialchars($row['product_id']); ?><br>
                                Name: <?= htmlspecialchars($row['title']); ?><br>
                                Quantity: <?= htmlspecialchars($row['quantity']); ?>
                            </td>
                            <td><?= htmlspecialchars($row['invoice_number']); ?></td>
                            <td>
                                <?php if ($row['status'] === 'pending') { ?>
                                    <form action="confirm_order.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="order_id" value="<?= $row['id']; ?>">
                                        <button class="btn btn-success btn-sm" type="submit">Pending</button>
                                    </form>
                                  
                                <?php } else { ?>
                                    <span class="text-muted">Confirmed</span>
                                <?php } ?>
                            </td>
                            <td><?= htmlspecialchars($row['grand_total']); ?></td>
                            <td>
                                <a href="http://localhost/ecommerce_project/admin/orders/delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                        <li class="page-item <?php if ($page === $i) echo 'active'; ?>">
                            <a class="page-link" href="?page=<?= $i . ($search ? '&search=' . urlencode($search) : ''); ?>"><?= $i; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
