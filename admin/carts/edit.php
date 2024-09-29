<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");


use App\Carts;

$_cart=new Carts();
$cart= $_cart->show();




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
                                value="<?= $cart['id'];?>"
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
                                value="<?= $cart['product_id'];?>"
                                id="inputProductID">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputUserID" class="col-sm-2 col-form-label">User ID</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                name="user_id"
                                value="<?= $cart['user_id'];?>"
                                id="inputUserID">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-sm-2 col-form-label"> Product Title</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                value="<?= $cart['title'];?>"
                                id="inputTitle">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputUnitPrice" class="col-sm-2 col-form-label">Unit Price</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="unit_price"
                                    value="<?= $cart['unit_price'];?>"
                                    id="inputUnitPrice">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputTotalPrice" class="col-sm-2 col-form-label">Total Price</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="total_price"
                                    value="<?= $cart['total_price'];?>"
                                    id="inputTotalPrice">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="quantity"
                                    value="<?= $cart['quantity'];?>"
                                    id="inputQuantity">
                        </div>
                    </div>
                 

                    <div class="mb-3 row">
                        <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                            <input
                                    type="file"
                                    class="form-control"
                                    name="picture"
                                    value="<?= $cart['picture'];?>"
                                    id="inputPicture">
                            <img src="<?= $webroot?>uploads/<?= $cart['picture'];?>" alt="Carts Image" class="img-fluid">

                            <input
                                    type="hidden"
                                    name="old_picture"
                                    value="<?= $cart['picture'];?>">

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

