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
                                value="<?= $product['id'];?>"
                                id="inputID">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputProductTitle" class="col-sm-2 col-form-label">Product Title</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                value="<?= $product['title'];?>"
                                id="inputProductTitle">
                        </div>
                    </div>
                    

                    <div class="mb-3 row">
                        <label for="inputDescription" class="col-sm-2 col-form-label"> Short Description</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="details"
                                    value="<?= $product['details'];?>"
                                    id="inputDescription">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputProductType" class="col-sm-2 col-form-label">Product Type</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="product_type"
                                    value="<?= $product['product_type'];?>"
                                    id="inputProductType">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputUnitPrice" class="col-sm-2 col-form-label">Unit Price</label>
                        <div class="col-sm-10">
                            <input
                                    type="number"
                                    class="form-control"
                                    name="unit_price"
                                    value="<?= $product['unit_price'];?>"
                                    id="inputUnitPrice">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputTotalPrice" class="col-sm-2 col-form-label">Total Price</label>
                        <div class="col-sm-10">
                            <input
                                    type="number"
                                    class="form-control"
                                    name="total_price"
                                    value="<?= $product['total_price'];?>"
                                    id="inputTotalPrice">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputMRP" class="col-sm-2 col-form-label">MRP</label>
                        <div class="col-sm-10">
                            <input
                                    type="number"
                                    class="form-control"
                                    name="mrp"
                                    value="<?= $product['mrp'];?>"
                                    id="inputMRP">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputStock_quantity" class="col-sm-2 col-form-label">Stock_quantity</label>
                        <div class="col-sm-10">
                            <input
                                    type="number"
                                    class="form-control"
                                    name="qty"
                                    value="<?= $product['qty'];?>"
                                    id="inputStock_quantity">
                        </div>
                    </div>
                    <div class="mb-3 row form-check">

                        <div class="col-sm-6">

                            <?php
                            if($product['is_active'] == 0){
                            ?>
                            <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="is_active"
                                    value="1"
                                    id="inputIsActive">

                            <?php
                            }else{
                            ?>
                            <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="is_active"
                                    value="1"
                                    checked
                                    id="inputIsActive">

                            <?php
                            }
                            ?>


                        </div>
                        <label for="inputIsActive" class="col-sm-6 form-check-label">Is Active</label>
                    </div>
                    <div class="mb-3 row form-check">

<div class="col-sm-6">

    <?php
    if($product['is_new'] == 0){
    ?>
    <input
            type="checkbox"
            class="form-check-input"
            name="is_new"
            value="1"
            id="inputIsNew">

    <?php
    }else{
    ?>
    <input
            type="checkbox"
            class="form-check-input"
            name="is_new"
            value="1"
            checked
            id="inputIsNew">

    <?php
    }
    ?>


</div>
<label for="inputIsActive" class="col-sm-6 form-check-label">Is New</label>
</div>


                    <div class="mb-3 row">
                        <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                            <input
                                    type="file"
                                    class="form-control"
                                    name="picture"
                                    value="<?= $product['picture'];?>"
                                    id="inputPicture">
                            <img src="<?= $webroot?>uploads/<?= $product['picture'];?>" alt="Product Image" class="img-fluid">

                            <input
                                    type="hidden"
                                    name="old_picture"
                                    value="<?= $product['picture'];?>">

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

