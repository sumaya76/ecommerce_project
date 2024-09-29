<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php"); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="shortcut icon" type="image/png" href="img/logo1.png" />
    <!-- <link rel="stylesheet" href="css/contact-us.css"> -->
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    <?php 
    include_once("../view/elements/header.php");
    ?>
    


<div class="maincontainer">
  <div class="container">
    <div class="row">
        <div class="col-sm-6"><br>
    
</div>
<div class="col-sm-6" ><br>
    <h1>FeedBack</h1>
    <p>If you have any questions or concerns, please fill out the form below and we will get back to you as soon as possible.</p>
    
    <form action="<?=$webroot?>admin/contacts/store.php" method="POST">
    
    <div class="mb-3 row">
         <label for="inputName" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="name"
                value=" "
                id="inputName"
               >
            </div>
             </div>
             <div class="mb-3 row">
         <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input
                type="email"
                class="form-control" 
                name="email"
                value=" "
                id="inputEmail"
               >
            </div>
             </div>
             <div class="mb-3 row">
         <label for="inputSubject" class="col-sm-2 col-form-label">Subject</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="subject"
                value=" "
                id="inputSubject"
               >
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputComment" class="col-sm-2 col-form-label">Message</label>
            <div class="col-sm-10">
              <textarea
                type="text"
                class="form-control" 
                name="comment"
                value=" "
                id="inputComment"
                rows="5" cols="30" required
               >
        </textarea>
            </div>
             </div>
            <button type="submit" class="btn btn-secondary mt-3">Submit</button>
            </form>
    </div>
 
</div>
</div>
</div><br>


<?php 
    include_once("../view/elements/footer.php");
    ?>


<script src="js/bootstrap.bundle.js"></script>
<script src="js/custom.js"></script>


</body>

</html>