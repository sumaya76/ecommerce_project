<?php
$_id = $_GET['id'];


//Connection to Database
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `logins` WHERE id= :id";


$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

$login= $stmt->fetch();

//var_dump($banner);

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

                <form method="post" action="update.php">
                    <div class="mb-3 row">
                        <label for="inputID" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input
                                type="hidden"
                                class="form-control"
                                name="id"
                                value="<?= $login['id'];?>"
                                id="inputID">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputUserName" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                name="namecategory"
                                value="<?=$login['namecategory'];?>"
                                id="inputUserName">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input
                                    type="password"
                                    class="form-control"
                                    name="passwordlogin"
                                    value="<?= $login['passwordlogin'];?>"
                                    id="inputPassword">
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

