<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");


use App\Orders;

$_order=new Orders();
$order= $_order->show();




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<section>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                <h1 class="text-center mb-5">Edit</h1>

                <form method="post" action="update.php" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="inputID" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input
                                type="hidden"
                                class="form-control"
                                name="id"
                                value="<?= $order['id'];?>"
                                id="inputID">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputProductID" class="col-sm-2 col-form-label">Product ID</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                name="product_id"
                                value="<?= $order['product_id'];?>"
                                id="inputProductID">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputProductTitle" class="col-sm-2 col-form-label">Product Title</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                value="<?= $order['title'];?>"
                                id="inputProductTitle">
                        </div>
                    </div>

                   
                    
                    
                    <div class="mb-3 row">
                        <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input
                                    type="number"
                                    class="form-control"
                                    name="quantity"
                                    value="<?= $order['quantity'];?>"
                                    id="inputQuantity">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="inputUserID" class="col-sm-2 col-form-label">User ID</label>
                        <div class="col-sm-10">
                            <input
                                    type="number"
                                    class="form-control"
                                    name="quantity"
                                    value="<?= $order['user_id'];?>"
                                    id="inputUserID">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputGrandtotal" class="col-sm-2 col-form-label">Grandtotal</label>
                        <div class="col-sm-10">
                            <input
                                    type="number"
                                    class="form-control"
                                    name="grand_total"
                                    value="<?= $order['grand_total'];?>"
                                    id="inputGrandtotal">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="address"
                                    value="<?= $order['address'];?>"
                                    id="inputAddress">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputInvoice" class="col-sm-2 col-form-label">Invoice</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="invoice_number"
                                    value="<?= $order['invoice_number'];?>"
                                    id="inputInvoice">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-secondary mt-3">Submit</button>
                </form>

            </div>
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

