<?php

$webroot = "http://localhost/ecommerce_project/";
$_id = $_GET['id'];


//Connection to Database
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `brands` WHERE id= :id";


$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

$brand = $stmt->fetch();

//var_dump($banner);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<section>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                <h1 class="text-center mb-5">Show</h1>
                <ul class="nav d-flex justify-content-center fs-4 fw-bold mb-4">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="index.php">Lists</a>
                    </li>

                </ul>

                <dl class="row">
                    <dt class="col-sm-3">ID:</dt>
                    <dd class="col-sm-9"><?= $brand['id'];?></dd>

                    <dt class="col-sm-3">Title:</dt>
                    <dd class="col-sm-9"><?= $brand['title'];?></dd>

                    <dt class="col-sm-3">Link:</dt>
                    <dd class="col-sm-9"><?= $brand['link'];?></dd>
                    
                    <dt class="col-sm-3">Created_at:</dt>
                    <dd class="col-sm-9"><?= $brand['created_at'];?></dd>

                    <dt class="col-sm-3">Modified_at:</dt>
                    <dd class="col-sm-9"><?= $brand['modified_at'];?></dd>
                    <dt class="col-sm-3">Is Active:</dt>
                    <dd class="col-sm-9"><?= $brand['is_active'] ? "Active" : "Inactive";?></dd>
                    
                </dl>



            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>






