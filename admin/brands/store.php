
<?php
/*echo "<pre>";
print_r($_FILES);
echo "</pre>";

echo $_FILES['picture']['name'];
echo "<br>";
echo $_FILES['picture']['tmp_name'];*/

/*echo "<pre>";
print_r($_SERVER);
echo "</pre>";
echo $_SERVER['DOCUMENT_ROOT']."/ecommerce-project/";
*/



$_title = $_POST['title'];
$_link = $_POST['link'];

if(array_key_exists('is_active', $_POST)){
    $_is_active = $_POST['is_active'];
}else{
    $_is_active = 0;
}

$_created_at = date (" Y-m-d H:i:s" );







//Connection to Database
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Query

$query = "INSERT INTO `brands` (`title`, `link`, `created_at`)
 VALUES (:title, :link, :created_at)";


$stmt = $conn->prepare($query);


$stmt->bindParam(':title', $_title);
$stmt->bindParam(':link', $_link);
$stmt->bindParam(':created_at', $_created_at);

$stmt->bindParam(':is_active', $_is_active);
$result = $stmt->execute();

//var_dump($result);
header("location:index.php");