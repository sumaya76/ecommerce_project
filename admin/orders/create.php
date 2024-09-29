<?php ob_start() ?>
<h1 class="text-center mb-5">Add New</h1>

<form method="post" action="store.php" enctype="multipart/form-data">
    <div class="mb-3 row">
        <label for="inputID" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-9">
            <input type="hidden" class="form-control" name="id" value="" id="inputID">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputProductID" class="col-sm-2 col-form-label">Product ID</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="product_id" value="" id="inputProductID">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputProductTitle" class="col-sm-2 col-form-label">Product Title</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="title" value="" id="inputProductTitle">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" name="quantity" value="" id="inputQuantity">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputUserID" class="col-sm-2 col-form-label">User ID</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="user_id" value="" id="inputUserID">
        </div>
    </div>


    <div class="mb-3 row">
        <label for="inputGrandtotal" class="col-sm-2 col-form-label">Grandtotal</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="grand_total" value="" id="inputGrandtotal">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="address" value="" id="inputAddress">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputInvoice" class="col-sm-2 col-form-label">Invoice</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="invoice_number" value="" id="inputInvoice">
        </div>
    </div>
    <button type="submit" class="btn btn-secondary mt-3">Submit</button>
</form>
<?php
$content = ob_get_clean();
include '../components/master.php';
?>