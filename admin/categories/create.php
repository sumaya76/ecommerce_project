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
                        <div class="col-sm-9">
                            <input
                                    type="hidden"
                                    class="form-control"
                                    name="id"
                                    value=""
                                    id="inputID">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value=""
                                    id="inputName">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputLink" class="col-sm-2 col-form-label">Link</label>
                        <div class="col-sm-9">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="link"
                                    value=""
                                    id="inputLink">
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
