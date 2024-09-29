<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");

use App\Products;

$_product = new Products();
$products = $_product->productdetail();

// Function to calculate final stock
function calculateFinalQuantity($product, $orders) {
    $qty = $product['qty']; // Initial quantity of the product
    $productId = $product['id'];

    // Sum up the quantities of all orders for this product
    $totalOrderedQuantity = 0;
    foreach ($orders as $order) {
        if ($order['product_id'] == $productId) {
            $totalOrderedQuantity += $order['quantity'];
        }
    }

    // Calculate the final quantity
    $finalQuantity = $qty - $totalOrderedQuantity;
    return ($finalQuantity >= 0) ? $finalQuantity : 0; // Ensure final quantity is not negative
}

// Ensure that $conn is defined and not null
if (!isset($conn)) {
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
}

// Fetch all orders from the database
$ordersQuery = "SELECT * FROM orders";
$ordersResult = $conn->query($ordersQuery);
$orders = [];
if ($ordersResult->num_rows > 0) {
    while ($row = $ordersResult->fetch_assoc()) {
        $orders[] = $row;
    }
}
?>


<section class="product-details mt-5">
    <div class="container">
        <div class="row">
            <?php foreach($products as $product): ?>
                <div class="col-sm-5">
                    <div class="xzoom-container">
                        <img class="xzoom2" src="<?=$webroot;?>uploads/<?=$product['picture'];?>" style="max-width: 50%; height: auto;">
                    </div> 
                </div>
                <div class="col-sm-7">
                    <div class="product-details">
                        <div class="product-name">
                            <h1 class="product_title entry-title text-uppercase"><?= $product['title']; ?></h1>
                        </div>
                        <div>
                            <p class="price">&#2547;<?= $product['mrp']; ?></p> 
                        </div>
                        <div class="short-description">
                            <h2 class="text-uppercase">Quick review:</h2>
                            <p><?= $product['details']; ?></p> 
                        </div>
                        <div class="stock">
                            <?php 
                            $finalQuantity = calculateFinalQuantity($product, $orders);
                            if ($finalQuantity > 0): ?>
                                <p>In Stock: <?= $finalQuantity; ?></p>
                                <div class="add-cart text-right">
                                    <a class="text-decoration-none" href="../../../admin/carts/create.php?id=<?= $product['id']; ?>">
                                        <button type="button" class="btn btn-danger btn-small">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            <span class="price">Add to Cart</span>
                                        </button>
                                    </a>
                                </div>
                            <?php else: ?>
                                <p class="text-danger">Out of Stock</p>
                                <button type="button" class="btn btn-secondary btn-small" disabled>
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span class="price">Out of Stock</span>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<br><br><br><br><br><br><br><br><br>
