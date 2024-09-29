<?php
session_start();

// Check if user is authenticated
if (!isset($_SESSION['is_authenticated'])) {
    header('location: ./../front/php/public/login.php');
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

// Fetch total products
$productQuery = "SELECT COUNT(*) as total_products FROM products WHERE is_active = 1 AND is_deleted = 0";
$productResult = $conn->query($productQuery);
$totalProducts = $productResult->num_rows > 0 ? $productResult->fetch_assoc()['total_products'] : 0;

$orderQuery = "SELECT COUNT(*) as total_orders FROM orders";
$orderResult = $conn->query($orderQuery);
$totalOrders = $orderResult->num_rows > 0 ? $orderResult->fetch_assoc()['total_orders'] : 0;

echo "Total Orders: " . $totalOrders;
$userQuery = "SELECT COUNT(*) as total_users FROM users";
$userResult = $conn->query($userQuery);
$totalUsers = $userResult->num_rows > 0 ? $userResult->fetch_assoc()['total_users'] : 0;

echo "Total Users: " . $totalUsers;
$bannerQuery = "SELECT COUNT(*) as total_banners FROM banners WHERE is_active = 1 AND is_deleted = 0";
$bannerResult = $conn->query($bannerQuery);
$totalBanners = $bannerResult->num_rows > 0 ? $bannerResult->fetch_assoc()['total_banners'] : 0;

$contactQuery = "SELECT COUNT(*) as total_contacts FROM contacts";
$contactResult = $conn->query($contactQuery);
$totalContacts = $contactResult->num_rows > 0 ? $contactResult->fetch_assoc()['total_contacts'] : 0;

echo "Total Users: " . $totalUsers;
$categoryQuery = "SELECT COUNT(*) as total_categories FROM categories";
$categoryResult = $conn->query($categoryQuery);
$totalCategories = $categoryResult->num_rows > 0 ? $categoryResult->fetch_assoc()['total_categories'] : 0;

echo "Total Categories: " . $totalCategories;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Furni Frenzy</title>
    <!-- Bootstrap CDN link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        .bg-drk-purple {
            background: purple;
        }
        .text-white::placeholder {
            color: white;
            opacity: 1; /* Firefox */
        }
        .text-white:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: white;
        }
        .text-white::-ms-input-placeholder { /* Microsoft Edge */
            color: white;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-drk-purple fixed-top flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-center" href="#">FurniFrenzy</a>

    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="http://localhost/ecommerce_project/logout.php">Sign out</a>
        </li>
    </ul>
</nav>

<section>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <?php include_once 'sidebar.php'; ?>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <br><br><br>
            <div class="row mb-3">
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-success">
                            <div class="rotate">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <h6 class="text-uppercase">Total Product</h6>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white text-center"><span><?php echo $totalProducts; ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body bg-danger">
                            <div class="rotate">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <h6 class="text-uppercase">Total Orders</h6>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white text-center"><span><?php echo $totalOrders; ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body bg-warning">
                            <div class="rotate">
                                <i class="fas fa-users"></i>
                            </div>
                            <h6 class="text-uppercase">Total Users</h6>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white text-center"><span><?php echo $totalUsers; ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                            <i class="fa-brands fa-pied-piper"></i>
                            </div>
                            <h6 class="text-uppercase">Total Banners</h6>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white text-center"><span><?php echo $totalBanners; ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body bg-secondary">
                            <div class="rotate">
                            <i class="fa-solid fa-comment-dots"></i>
                            </div>
                            <h6 class="text-uppercase">Total Customer Feedback</h6>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white text-center"><span><?php echo $totalContacts; ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body bg-primary">
                            <div class="rotate">
                            <i class="fa-solid fa-layer-group"></i>
                            </div>
                            <h6 class="text-uppercase">Total Product Categories</h6>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white text-center"><span><?php echo $totalCategories; ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</section>

<!-- JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
// Close the database connection
$conn->close();
?>
