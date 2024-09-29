
<?php
/*echo "<pre>";
print_r($_POST);
echo "</pre>";

die();*/


$approot = $_SERVER['DOCUMENT_ROOT']."/ecommerce_project/";
//Working with image

$file_name = "IMG".time()."_".$_FILES['picture']['name'];

$target = $_FILES['picture']['tmp_name'];

$destination = $approot.'uploads/'.$file_name;

$is_file_move = move_uploaded_file($target, $destination);

if($is_file_move){
    $_picture = $file_name;
}else{
    $_picture = null;
}


$_title = $_POST['title'];




//Connection to Database
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Query

$query = "INSERT INTO `labels` (`title`,`picture`)
 VALUES (:title,  :picture)";


$stmt = $conn->prepare($query);


$stmt->bindParam(':title', $_title);


$stmt->bindParam(':picture', $_picture);

$result = $stmt->execute();

//var_dump($result);
header("location:index.php");