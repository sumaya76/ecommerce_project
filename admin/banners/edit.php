<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");


use App\Banners;

$_banner=new Banners();
$banner= $_banner->show();




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
                                value="<?= $banner['id'];?>"
                                id="inputID">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                value="<?= $banner['title'];?>"
                                id="inputTitle">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputLink" class="col-sm-2 col-form-label">Link</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="link"
                                    value="<?= $banner['link'];?>"
                                    id="inputLink">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPromotional_message" class="col-sm-2 col-form-label">Promotional <br> message</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="promotional_message"
                                    value="<?= $banner['promotional_message'];?>"
                                    id="inputPromotional_message">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputHTML_Banner" class="col-sm-2 col-form-label">HTML <br> Banner</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="hTML_Banner"
                                    value="<?= $banner['hTML_Banner'];?>"
                                    id="inputHTML_Banner">
                        </div>
                    </div>
                    
                    <div class="mb-3 row form-check">

                        <div class="col-sm-6">

                            <?php
                            if($banner['is_active'] == 0){
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

                    <div class="mb-3 row">
                        <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                            <input
                                    type="file"
                                    class="form-control"
                                    name="picture"
                                    value="<?= $banner['picture'];?>"
                                    id="inputPicture">
                            <img src="<?= $webroot?>uploads/<?= $banner['picture'];?>" alt="Banner Image" class="img-fluid">

                            <input
                                    type="hidden"
                                    name="old_picture"
                                    value="<?= $banner['picture'];?>">

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

