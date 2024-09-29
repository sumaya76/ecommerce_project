<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");


use App\Admins;

$_admin = new Admins();
$admins = $_admin->index();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<section>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                <h1 class="text-center mb-5">Lists</h1>

                <ul class="nav d-flex justify-content-center fs-4 fw-bold mb-4">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="create.php">Add New</a>
                    </li>
                </ul>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($admins as $admin):
                    ?>
                    <tr>
                        <td><?php echo $admin['user_name'];?></td>

                        <td>
                            <a href="show.php?id=<?= $admin['id']?>">Show</a> |
                            
                            <a href="delete.php?id=<?= $admin['id']?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

