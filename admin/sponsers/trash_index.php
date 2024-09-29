<pre>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="SELECT * FROM `sponsers`WHERE is_deleted=1";
$stmt=$conn->prepare($query);
$stmt->execute();
$sponsers=$stmt->fetchAll();

?>
</pre>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
 <section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 ">

            <h1 class="text-center mb-5">List</h1>
            <ul class="nav d-flex justify-content-center fs-4 fw-bold mb-4">
            
                    <li class="nav-item">
                        <a class="nav-link text-success" href="index.php">Index</a>
                    </li>

                </ul>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($sponsers as $sponsers):
   
    ?>
    <tr>
      
      <td><?php echo $sponsers['title'];?></td>
      <td>
        
      <a href="restore.php?id=<?=$sponsers['id']?>">Restore</a> |
      <a href="delete.php?id=<?=$sponsers['id']?>">Delete</a></td>
      
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