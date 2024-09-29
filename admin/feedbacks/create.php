<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<section class="myAccount">
    <div class="container">
        <h4 class="text-center mt-5 mb-4">My Account</h4>
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <form method="post" action="store.php">
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
                        <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input
                                    type="hidden"
                                    class="form-control"
                                    name="title"
                                    value=""
                                    id="inputTitle">
                        </div>
                    </div>
                    
                    
                    <div class="mb-3 row">
                        <label for="inputFeedback" class="col-sm-2 col-form-label">Feedback</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="details"
                                    value=""
                                    id="inputFeedback">
                        </div>
                    </div>
                    
                  
                    <div class="mb-5 row mt-4">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>


    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
