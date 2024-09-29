<?php ob_start() ?>

<h1 class="text-center mb-5">Add New</h1>

<form method="post" action="store.php">
    <div class="mb-3 row">
        <label for="inputID" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <input type="hidden" class="form-control" name="id" value="" id="inputID">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputUserName" class="col-sm-2 col-form-label">User Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="user-name" value="" id="inputUserName">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" value="" id="inputPassword">
        </div>
    </div>




    <button type="submit" class="btn btn-secondary mt-3">Submit</button>
</form>

<?php
$content = ob_get_clean();
include '../components/master.php';
?>