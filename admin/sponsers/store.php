
<?php
$approot = $_SERVER['DOCUMENT_ROOT']."/ecommerce_project/"; 
// img
$file_name = "IMG".time()."_".$_FILES['picture']['name'];

$target = $_FILES['picture']['tmp_name'];

$destination = $approot.'uploads/'.$file_name;

$is_file_move = move_uploaded_file($target, $destination);

if($is_file_move){
    $_picture = $file_name;
}else{
    $_picture = null;
}    

$_title=$_POST['title'];    
$_link=$_POST['link'];    
$_promotional_message=$_POST['promotional_message'];       
$_html_banner=$_POST['html_banner'];
$_created_at = date("Y-m-d h:i:s");


if(array_key_exists('is_active', $_POST)){
    $_is_active = $_POST['is_active'];
}else{
    $_is_active = 0;
}

//conection to database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
//insert query

$query= "INSERT INTO `sponsers` (`is_active`,`title`,`link`,`promotional_message`,`html_banner`,`picture`,`created_at`) 
VALUES (:is_active,:title,:link,:promotional_message,:html_banner,:picture,:created_at)";


$stmt=$conn->prepare($query);
$stmt->bindParam(':is_active', $_is_active);
$stmt->bindParam(':title',$_title); 
$stmt->bindParam(':link',$_link); 
$stmt->bindParam(':promotional_message',$_promotional_message);  
$stmt->bindParam(':html_banner',$_html_banner); 
$stmt->bindParam(':created_at', $_created_at);
$stmt->bindParam(':picture', $_picture);
$result=$stmt->execute();

header("location:index.php");