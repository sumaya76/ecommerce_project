<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Section</title>
    <link rel="stylesheet" href="front/php/public/bootstrap min.css">
  
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light gray background */
            margin: 0;
            padding: 0;
        }
        .container-fluid {
            padding: 20px;
        }
        #sidebar {
            background-color: #495057; /* Dark background for sidebar */
            color: #fff;
            min-height: 100vh;
            padding: 20px 10px;
        }
        .sidebar-menu h1 {
            color: #fff;
            font-size: 1.5em;
            margin-bottom: 20px;
            text-align: center;
        }
        .sidebar-menu button,
        .sidebar-menu a {
            background-color: #ef4749; /*#495057 Darker background for buttons */
            color: #fff;
            border: none;
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            text-align: center;
            text-decoration: none;
            font-size: 1em;
            cursor: pointer;
            border-radius: 1rem;
        }
        .sidebar-menu button:hover,
        .sidebar-menu a:hover {
            background-color: #6c757d; /* Lighter on hover */
        }
        #main {
            padding: 20px;
            background-color: #fff; /* White background for main content */
        }
        .title {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .section-content {
            display: none;
        }
        .user-profile p {
            font-size: 1em;
            margin: 10px 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 50%;
            padding: 8px;
            box-sizing: border-box;
            background-color: #495057;
            color: #fff;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #ef4749; /* Dark background for buttons */
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #6c757d; /* Lighter on hover */
        }
    </style>
</head>
<body>
<section>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-2" id="sidebar">
                <ul class="sidebar-menu">
                    <h1>My Profile</h1>
                    <button onclick="showSection('profile')">Update Profile</button>
                    <button onclick="showSection('orders')">Order History</button>
                    <a href="http://localhost/ecommerce_project/front/php/public/index.php" class="active">
                        <i class="fa-solid fa-user-lock"></i> Logout
                    </a>
                </ul>
            </aside>

            <main class="col-md-10" id="main">
                <section id="profile" class="section-content">
                    <h3 class="title">Update Profile</h3>
                    <?php
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    try {
                        $conn = new PDO("mysql:host=localhost;dbname=ecommerce_project", "root", "");
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];

                            // Fetch user details
                            $user_sql = "SELECT first_name, last_name, user_name, phone_number, email, address, shipping_address FROM users WHERE id = :user_id";
                            $user_stmt = $conn->prepare($user_sql);
                            $user_stmt->bindParam(':user_id', $user_id);
                            $user_stmt->execute();
                            $user = $user_stmt->fetch(PDO::FETCH_ASSOC);

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (isset($_POST['update_profile'])) {
                                    // Update user details
                                    $first_name = $_POST['first_name'];
                                    $last_name = $_POST['last_name'];
                                    $user_name = $_POST['user_name'];
                                    $phone_number = $_POST['phone_number'];
                                    $email = $_POST['email'];
                                    $address = $_POST['address'];
                                    $shipping_address = $_POST['shipping_address'];

                                    $update_sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, user_name = :user_name, phone_number = :phone_number, email = :email, address = :address, shipping_address = :shipping_address WHERE id = :user_id";
                                    $update_stmt = $conn->prepare($update_sql);
                                    $update_stmt->bindParam(':first_name', $first_name);
                                    $update_stmt->bindParam(':last_name', $last_name);
                                    $update_stmt->bindParam(':user_name', $user_name);
                                    $update_stmt->bindParam(':phone_number', $phone_number);
                                    $update_stmt->bindParam(':email', $email);
                                    $update_stmt->bindParam(':address', $address);
                                    $update_stmt->bindParam(':shipping_address', $shipping_address);
                                    $update_stmt->bindParam(':user_id', $user_id);

                                    if ($update_stmt->execute()) {
                                        // Refresh the page to reflect changes
                                        header("Location: " . $_SERVER['PHP_SELF']);
                                        exit;
                                    } else {
                                        echo "Failed to update profile.";
                                    }
                                }

                                if (isset($_POST['change_password'])) {
                                    // Update user password
                                    $password = $_POST['password'];

                                    $update_password_sql = "UPDATE users SET password = :password WHERE id = :user_id";
                                    $update_password_stmt = $conn->prepare($update_password_sql);
                                    $update_password_stmt->bindParam(':password', $password);
                                    $update_password_stmt->bindParam(':user_id', $user_id);

                                    if ($update_password_stmt->execute()) {
                                        // Refresh the page to reflect changes
                                        header("Location: " . $_SERVER['PHP_SELF']);
                                        exit;
                                    } else {
                                        echo "Failed to update password.";
                                    }
                                }
                            }
                        } else {
                            echo "User is not logged in.";
                            $user = null;
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                        $user = null;
                    }
                    ?>

                    <?php if ($user): ?>
                        <form method="POST">
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="user_name">Username:</label>
                                <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($user['user_name']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($user['phone_number']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="shipping_address">Shipping Address:</label>
                                <input type="text" id="shipping_address" name="shipping_address" value="<?php echo htmlspecialchars($user['shipping_address']); ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="update_profile">Update Profile</button>
                            </div>
                        </form>

                        <hr>

                        <h3 class="title">Change Password</h3>
                        <form method="POST">
                            <div class="form-group">
                                <label for="password">New Password:</label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="change_password">Update Password</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <p>User details not available.</p>
                    <?php endif; ?>
                </section>

                <section id="orders" class="section-content">
                    <h3 class="title">Order History</h3>
                    <div class="row mobile-scrollable">
                        <?php
                        try {
                            if (isset($_SESSION['user_id'])) {
                                $user_id = $_SESSION['user_id'];

                                // Select confirmed orders for the logged-in user
                                $sql = "SELECT id, title, quantity, grand_total, invoice_number, address 
                                        FROM orders 
                                        WHERE user_id = :user_id AND status = 'confirmed'";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':user_id', $user_id);
                                $stmt->execute();
                                $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            } else {
                                echo "User is not logged in.";
                                $orders = [];
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                            $orders = [];
                        }
                        ?>

                        <?php if (!empty($orders)): ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>OrderID</th>
                                        <th>ProductTitle</th>
                                        <th>Quantity</th>
                                        <th>GrandTotal</th>
                                        <th>InvoiceNumber</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($order['id']); ?></td>
                                            <td><?php echo htmlspecialchars($order['title']); ?></td>
                                            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                                            <td><?php echo htmlspecialchars($order['grand_total']); ?></td>
                                            <td><?php echo htmlspecialchars($order['invoice_number']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>No confirmed orders found.</p>
                        <?php endif; ?>
                    </div>
                </section>
            </main>
        </div>
    </div>
</section>

<script>
    function showSection(sectionId) {
        // Hide all sections
        var sections = document.querySelectorAll('.section-content');
        sections.forEach(function(section) {
            section.style.display = 'none';
        });

        // Show the selected section
        document.getElementById(sectionId).style.display = 'block';
    }

    // Default to showing the profile section
    document.addEventListener('DOMContentLoaded', function() {
        showSection('profile');
    });
</script>
</body>
</html>
