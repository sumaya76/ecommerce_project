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
$whereClause = '';

// If search keyword is provided, construct WHERE clause for searching
if ($search) {
    $keywords = explode(" ", $search);
    $conditions = [];
    foreach ($keywords as $keyword) {
        $conditions[] = "(p.title LIKE '%$keyword%' OR c.name LIKE '%$keyword%')";
    }
    $whereClause = "WHERE " . implode(" AND ", $conditions);
}

$stockQuery = "SELECT p.id, p.title, p.qty, o.total_quantity, p.qty - COALESCE(o.total_quantity, 0) AS stock_quantity, p.picture, c.name AS category_name, p.is_new, p.unit_price
               FROM products p
               LEFT JOIN (
                 SELECT product_id, SUM(quantity) AS total_quantity
                 FROM orders
                 GROUP BY product_id
               ) o ON p.id = o.product_id
               LEFT JOIN categories c ON p.category_id = c.id
               $whereClause
               LIMIT $limit, $recordsPerPage";

$stockResult = $conn->query($stockQuery);
if (!$stockResult) {
    die("Query failed: " . $conn->error);
}

// Get total number of products for pagination
$totalProductsQuery = "SELECT COUNT(*) AS total FROM products p
                       LEFT JOIN categories c ON p.category_id = c.id
                       $whereClause";
$totalProductsResult = $conn->query($totalProductsQuery);
$totalProducts = $totalProductsResult->fetch_assoc()['total'];
$totalPages = ceil($totalProducts / $recordsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furni Frenzy - Products in Stock</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
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
        .main-content {
            margin-left: 240px; /* Same as sidebar width */
            padding: 20px;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header-container h2 {
            margin: 0;
        }
        
        .btn-add-product:hover {
            background-color: #218838;
        }
        .table img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }
        .btn-group .btn {
            margin-right: 5px;
        }
        .search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .pagination {
            justify-content: center;
        }
        .table thead th {
            background-color: #343a40;
            color: white;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #e9ecef;
        }
        .table tbody tr:hover {
            background-color: #ced4da;
        }
    </style>
</head>
<body>

<?php include_once 'sidebar.php'; ?>

<div class="container mt-4 main-content">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Products Management</h2>
            <div class="header-container">
                <form class="search-form" method="GET" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?= htmlspecialchars($search) ?>">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </form>
                <a href="http://localhost/ecommerce_project/admin/products/create.php" class="btn btn-success btn-add-product ms-auto">Add Product</a>
            </div>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ProductID</th>
                        <th>ProductPicture</th>
                        <th>ProductTitle</th>
                        <th>Category</th>
                        <th>New Product</th>
                        <th>Total Price</th>
                        <th>In Stock</th>
                        <th>Out Stock</th>
                        <th>Final Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stockResult->fetch_assoc()) { ?>
                        <tr>
                            <td><?= isset($row['id']) ? htmlspecialchars($row['id']) : ''; ?></td>
                            <td>
                                <img src="../uploads/<?= isset($row['picture']) ? htmlspecialchars($row['picture']) : ''; ?>" alt="<?= isset($row['title']) ? htmlspecialchars($row['title']) : ''; ?>">
                            </td>
                            <td><?= isset($row['title']) ? htmlspecialchars($row['title']) : ''; ?></td>
                            <td><?= isset($row['category_name']) ? htmlspecialchars($row['category_name']) : ''; ?></td>
                            <td><?= isset($row['is_new']) ? ($row['is_new'] ? 'Yes' : 'No') : ''; ?></td>
                            <td><?= isset($row['unit_price']) ? htmlspecialchars(number_format($row['unit_price'], 2)) : ''; ?></td>

                            <td><?= isset($row['qty']) ? htmlspecialchars($row['qty']) : ''; ?></td>
                            <td><?= isset($row['total_quantity']) ? htmlspecialchars($row['total_quantity']) : ''; ?></td>
                            <td><?= isset($row['stock_quantity']) ? htmlspecialchars($row['stock_quantity']) : ''; ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="http://localhost/ecommerce_project/admin/products/edit.php?id=<?= isset($row['id']) ? htmlspecialchars($row['id']) : ''; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="http://localhost/ecommerce_project/admin/products/delete.php?id=<?= isset($row['id']) ? htmlspecialchars($row['id']) : ''; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                                </div>
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
            <!-- End Pagination -->
        </div>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
