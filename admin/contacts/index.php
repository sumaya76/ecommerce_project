<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");


use App\Contacts;

$_contact = new Contacts();
$contacts = $_contact->index();

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
               

                <ul class="nav d-flex justify-content-center fs-4 fw-bold mb-4">
                    <li class="nav-item">
                   
                        <a class="nav-link text-success text-center" href="create.php">Please share your valuable Opinion!!</a>
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
                    foreach ($contacts as $contact):
                    ?>
                    <tr>
                        <td><?php echo $contact['email'];?></td>

                        <td>
                            <a href="show.php?id=<?= $contact['id']?>">Show</a> |
                            
                            <a href="delete.php?id=<?= $contact['id']?>">Delete</a>
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

