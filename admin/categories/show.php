                  
<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");

use App\Categories;

$_category = new Categories();
$category = $_category->show();

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
                    <dt class="col-sm-3"> Category ID:</dt>
                    <dd class="col-sm-9"><?= $category['id'];?></dd>
                    <dt class="col-sm-3"> Name:</dt>
                    <dd class="col-sm-9"><?= $category['name'];?></dd>
                    <dt class="col-sm-3">Link:</dt>
                    <dd class="col-sm-9"><?= $category['link'];?></dd>
                    <dt class="col-sm-3">Created_at:</dt>
                    <dd class="col-sm-9"><?= $category['created_at'];?></dd>

                    <dt class="col-sm-3">Modified_at:</dt>
                    <dd class="col-sm-9"><?= $category['modified_at'];?></dd>
                </dl>



            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>






