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
                        <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="inputFirstName"
                                    name="first_name"
                                    value=""
                                    placeholder="Write your first name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="inputLastName"
                                    name="last_name"
                                    value=""
                                    placeholder="Write your last name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input
                                    type="email"
                                    class="form-control"
                                    id="inputEmail"
                                    name="email"
                                    value=""
                                    placeholder="Write your email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPhoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input
                                    type="tel"
                                    class="form-control"
                                    id="inputPhoneNumber"
                                    name="phone_number"
                                    value=""
                                    placeholder="Write your Phone Number">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputUserName" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="inputUserName"
                                    name="user_name"
                                    value=""
                                    placeholder="Write your User Name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="inputAddress"
                                    name="address"
                                    value=""
                                    placeholder="Write your Address">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAddress" class="col-sm-2 col-form-label">Shipping Address</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                id="inputAddress"
                                name="shipping_address"
                                value=""
                                placeholder="Write your Shipping Address Address">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input
                                    type="password"
                                    class="form-control"
                                    id="inputPassword"
                                    name="password"
                                    value=""
                                    placeholder="Write your password">
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
