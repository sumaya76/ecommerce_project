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
        $conditions[] = "(u.first_name LIKE '%$keyword%' OR u.last_name LIKE '%$keyword%' OR u.email LIKE '%$keyword%')";
    }
    $whereClause = "WHERE " . implode(" AND ", $conditions);
}

$userQuery = "SELECT id, first_name, last_name, email, phone_number, user_name, address ,shipping_address
              FROM users u
              $whereClause
              LIMIT $limit, $recordsPerPage";

$userResult = $conn->query($userQuery);
if (!$userResult) {
    die("Query failed: " . $conn->error);
}

// Get total number of users for pagination
$totalUsersQuery = "SELECT COUNT(*) AS total FROM users u $whereClause";
$totalUsersResult = $conn->query($totalUsersQuery);
$totalUsers = $totalUsersResult->fetch_assoc()['total'];
$totalPages = ceil($totalUsers / $recordsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furni Frenzy - Registered Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
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
        .btn-add-user {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-add-user:hover {
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
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">View Register Customer</h2>
            <div class="header-container">
                <form class="search-form" method="GET" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?= htmlspecialchars($search) ?>">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </form>
                <!--<a href="http://localhost/ecommerce_project/admin/users/create.php" class="btn btn-add-user ms-auto">Add User</a>-->
            </div>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>UserID</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>PhoneNumber</th>
                        <th>Username</th>
                        <th>Address</th>
                        <th>Shipping Address</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $userResult->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']); ?></td>
                            <td><?= htmlspecialchars($row['first_name']); ?></td>
                            <td><?= htmlspecialchars($row['last_name']); ?></td>
                            <td><?= htmlspecialchars($row['email']); ?></td>
                            <td><?= htmlspecialchars($row['phone_number']); ?></td>
                            <td><?= htmlspecialchars($row['user_name']); ?></td>
                            <td><?= htmlspecialchars($row['address']); ?></td>
                            <td><?= htmlspecialchars($row['shipping_address']); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    
                                    <a href="http://localhost/ecommerce_project/admin/users/delete.php?id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
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
