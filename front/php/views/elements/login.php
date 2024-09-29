
<?php  

    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if(isset($_GET['previous_url']))
        {
            $redirect = $_GET['previous_url'];
        }
    }
?>
<section class="logIn">
    <div class="container">
        <h4 class="text-center mt-5 mb-4">Login</h4>
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
            <form method="post" action="<?=$webroot?>session.php">
                    <div class="mb-3 row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                id="inputEmail"
                                name="email"
                                value=""
                                placeholder="Write your Email"required>
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
                                placeholder="Write your password"required>
                        </div>
                    </div>
                    <div class="mb-5 row mt-4">
                        <div class="col-sm-10 ">
                            <button type="submit" class="btn btn-secondary ">Submit</button>
                        </div>
                    </div>

                    <input type="hidden" name="redirect" value="<?php if(isset($redirect)){ echo $redirect; }?>">

                </form>


            </div>
        </div>


    </div>
   
</section>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

