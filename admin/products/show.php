<?php

include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");


use App\Products;

$_product=new Products();
$product= $_product->show();


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
                    <dt class="col-sm-3"> Product ID:</dt>
                    <dd class="col-sm-9"><?= $product['id'];?></dd>

                    <dt class="col-sm-3">Product Title:</dt>
                    <dd class="col-sm-9"><?= $product['title'];?></dd>
                    
                    <dt class="col-sm-3">Description:</dt>
                    <dd class="col-sm-9"><?= $product['details'];?></dd>

                    <dt class="col-sm-3">Product Type:</dt>
                    <dd class="col-sm-9"><?= $product['product_type'];?></dd>
                    
                    <dt class="col-sm-3">Unit Price:</dt>
                    <dd class="col-sm-9"><?= $product['unit_price'];?></dd>
                    <dt class="col-sm-3">Total Price:</dt>
                    <dd class="col-sm-9"><?= $product['total_price'];?></dd>
                    <dt class="col-sm-3">MRP:</dt>
                    <dd class="col-sm-9"><?= $product['mrp'];?></dd>
                    <dt class="col-sm-3">Stock_quantity:</dt>
                    <dd class="col-sm-9"><?= $product['qty'];?></dd>
                    <dt class="col-sm-3">Is Active:</dt>
                    <dd class="col-sm-9"><?= $product['is_active'] ? "Active" : "Inactive";?></dd>
                    <dt class="col-sm-3">Is New:</dt>
                    <dd class="col-sm-9"><?= $product['is_new'] ? "Active" : "Inactive";?></dd>
                   
                    <dt class="col-sm-3">Created_at:</dt>
                    <dd class="col-sm-9"><?= $product['created_at'];?></dd>

                    <dt class="col-sm-3">Modified_at:</dt>
                    <dd class="col-sm-9"><?= $product['modified_at'];?></dd>

                    <dt class="col-sm-3">Picture:</dt>
                    <dd class="col-sm-9">
                        <?= $product['picture'];?>
                        <img src="<?= $webroot?>uploads/<?= $product['picture'];?>" alt="Product Image" class="img-fluid">
                    </dd>

                </dl>



            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>






