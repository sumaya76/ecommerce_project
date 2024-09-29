<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Furni Frenzy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
    <div class="container bg-light">
        <div class="container-foulid border-bottom border-success ">
            <div class="row p-3">
                <div class="col-sm-11">
                    <h1><a href="index.html" class=" text-decoration-none"> Furni Frenzy</a> </h1>
                </div>
                <div class="col-sm-1">
                    <p> <a href="#" class=" text-decoration-none">Logout</a></p>
                </div>
            </div>
        </div>
        <div class="container-foulid">
            <div class="row">
                <div class="col-md-3">
                    <?php
                        include_once('../components/partials/sidebar.php')
                    ?>

                </div>
                <div class="col-md-9 mt-2">
                    <?php
                        echo $content;
                    ?>
                </div>
            </div>
        </div>
    </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>