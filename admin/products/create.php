<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");


use App\Categories;

$_category = new Categories();
$categories = $_category->index();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<section>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                <h1 class="text-center mb-5">Add New</h1>

                <form method="post" action="store.php" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="inputID" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input
                                    type="hidden"
                                    class="form-control"
                                    name="id"
                                    value=""
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
                                    value=""
                                    id="inputProductTitle">
                        </div>
                    </div>

                    <div class="mb-3 row">
                    <label for="inputProductTitle" class="col-sm-2 col-form-label">Categories</label>
                    <div class="col-sm-10">
                    <select name="category_id" class="form-select" aria-label="Default select example">
                    <option selected >Select Category</option>
                    <?php
                    foreach ($categories as $category):
                    ?>
                    <option value="<?php echo $category['id']?>"><?php echo $category['name'];?></option>  
                    <?php
                    endforeach;
                    ?>
                    </select>
                    </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputDescription" class="col-sm-2 col-form-label"> Short Description</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="details"
                                    value=""
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
                                    value=""
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
                                    value=""
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
                                    value=""
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
                                    value=""
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
                                    value=""
                                    id="inputStock_quantity">
                        </div>
                    </div>
                    
                 

                    <div class="mb-3 row form-check">

                        <div class="col-sm-6">
                            <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="is_active"
                                    value="1"
                                    id="inputIsActive">
                        </div>
                        <label for="inputIsActive" class="col-sm-4 form-check-label">Is Active</label>
                    </div>
                   
                    
                    <div class="mb-3 row form-check">

                        <div class="col-sm-6">
                            <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="is_new"
                                    value="1"
                                    id="inputIsNew">
                        </div>
                        <label for="inputIsActive" class="col-sm-4 form-check-label">Is New</label>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                            <input
                                    type="file"
                                    class="form-control"
                                    name="picture"
                                    value=""
                                    id="inputPicture">
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
