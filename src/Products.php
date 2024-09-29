<?php
namespace App;
use PDO;
class Products{
    public $id=null;
    public $title=null;
    public $details=null;
    public $product_type=null;
  
    public $_unit_price=null;
    public $_mrp=null;
    public $_total_price=null;
  
    public $conn=null;
public function __construct()

{
$servername = "localhost";
$username = "root";
$password = "";
$this->conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

// set the PDO error mode to exception
$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }


   public function index(){

   $query="SELECT * FROM `products` WHERE is_deleted= 0 ";
   $stmt=$this->conn->prepare($query);
   $stmt->execute();
   $products=$stmt->fetchAll();
   return  $products;

    }

    public function getProduct($id){

        $query="SELECT * FROM `products` WHERE id = $id";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $product=$stmt->fetch();
        return  $product;
     
         }



    public function getProductsByCategoryId($id){

        $query="SELECT * FROM `products` WHERE is_deleted= 0 AND category_id = $id";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $products=$stmt->fetchAll();
        return  $products;
     
         }


    public function getActiveProducts(){
        $_startForm = 0;
        $_total = 4;

        $query="SELECT * FROM `products` WHERE is_active = 1 LIMIT  $_startForm,  $_total ";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $products=$stmt->fetchAll();
        return  $products;
     
         }
         
    public function store(){

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
        $_category_id = $_POST['category_id'];
        $_details = $_POST['details'];
        $_product_type = $_POST['product_type'];
        $_unit_price = $_POST['unit_price'];
        $_total_price = $_POST['total_price'];
        $_total_price = $_POST['mrp'];
        $_qty = $_POST['qty'];
        
        if(array_key_exists('is_active', $_POST)){
            $_is_active = $_POST['is_active'];
        }else{
            $_is_active = 0;
        }
        if(array_key_exists('is_new', $_POST)){
            $_is_new = $_POST['is_new'];
        }else{
            $_is_new = 0;
        }
        
        $_created_at = date (" Y-m-d H:i:s" );
        

        $query = "INSERT INTO `products` (`title`, `category_id`, `details`, `product_type`,`unit_price`,`total_price`,`mrp`,`qty`,`picture`,`is_active`,`is_new`,`created_at`)
        VALUES (:title, :category_id, :details, :product_type, :unit_price, :total_price, :mrp, :qty, :picture, :is_active, :is_new, :created_at)";
       

$stmt=$this->conn->prepare($query);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':category_id', $_category_id);
$stmt->bindParam(':details', $_details);
$stmt->bindParam(':product_type', $_product_type);
$stmt->bindParam(':unit_price', $_unit_price);
$stmt->bindParam(':total_price', $_total_price);
$stmt->bindParam(':mrp', $_mrp);
$stmt->bindParam(':qty', $_qty);

$stmt->bindParam(':picture', $_picture);
$stmt->bindParam(':is_active', $_is_active);
$stmt->bindParam(':is_new', $_is_new);

$stmt->bindParam(':created_at', $_created_at);

$result=$stmt->execute();

header("location:index.php");
    }

    public function show(){
        $webroot="http://localhost/ecommerce_project/";
         $_id=$_GET['id'];


        $query="SELECT * FROM `products`WHERE id=:id";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':id',$_id);
        $stmt->execute();
        $product=$stmt->fetch();
        return $product;
    }

    public function edit(){
        $webroot = "http://localhost/ecommerce_project/";
    $_id=$_GET['id'];



$query="SELECT * FROM `products`WHERE id=:id";
$stmt=$this->conn->prepare($query);
$stmt->bindParam(':id',$_id);
$stmt->execute();
$product=$stmt->fetch();
return $product;
    }

    public function update(){  
        $approot = $_SERVER['DOCUMENT_ROOT']."/ecommerce_project/";
        //Working with image
        if($_FILES['picture']['name'] != "" ){
            $file_name = "IMG".time()."_".$_FILES['picture']['name'];
        
            $target = $_FILES['picture']['tmp_name'];
        
            $destination = $approot.'uploads/'.$file_name;
        
            $is_file_move = move_uploaded_file($target, $destination);
        
            if($is_file_move){
                $_picture = $file_name;
            }else{
                $_picture = null;
            }
        }else{
            $_picture = $_POST['old_picture'];
        }
        
        
        if(array_key_exists('is_active', $_POST)){
            $_is_active = $_POST['is_active'];
        }else{
            $_is_active = 0;
        }


        if(array_key_exists('is_new', $_POST)){
            $_is_new = $_POST['is_new'];
        }else{
            $_is_new = 0;
        }
        
        
        
        
        $_id = $_POST['id'];
        $_title = $_POST['title'];
       
        $_details = $_POST['details'];
        $_product_type = $_POST['product_type'];
        $_unit_price = $_POST['unit_price'];
        $_total_price = $_POST['total_price'];
        $_mrp = $_POST['mrp'];
        $_qty = $_POST['qty'];
        
        
        $_modified_at = date (" Y-m-d H:i:s" );                                                  





    $query = "UPDATE `products` SET `title` = :title, `details` = :details, `product_type` = :product_type,`unit_price` = :unit_price,`total_price` = :total_price,`mrp` = :mrp,`qty` = :qty,`is_active` = :is_active,`is_new` = :is_new,  `picture` = :picture, `modified_at` = :modified_at WHERE `products`.`id` = :id";
     
     $stmt=$this->conn->prepare($query);
       
       
       $stmt->bindParam(':id', $_id);
       $stmt->bindParam(':title', $_title);
   
       $stmt->bindParam(':details', $_details);
       $stmt->bindParam(':product_type', $_product_type);
       $stmt->bindParam(':unit_price', $_unit_price);
       $stmt->bindParam(':total_price', $_total_price);
       $stmt->bindParam(':mrp', $_mrp);
       $stmt->bindParam(':qty', $_qty);
       $stmt->bindParam(':picture', $_picture);
       $stmt->bindParam(':is_active', $_is_active);
       $stmt->bindParam(':is_new', $_is_new);
  
       $stmt->bindParam(':modified_at', $_modified_at);
       
       $result =$stmt->execute();
       
header("location:index.php");
    }

    public function delete(){
    $_id=$_GET['id'];

    
    $query="DELETE FROM products WHERE `products`.`id` = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $_id); 
    $stmt->execute();
    header("location:index.php");

    }

    public function restore(){

    $_id=$_GET['id'];
    $_is_deleted= 0;
    
    
    
    $query="UPDATE `products` SET `is_deleted`=:is_deleted WHERE `products`.`id` = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $_id); 
    $stmt->bindParam(':is_deleted', $_is_deleted); 
    $stmt->execute();
    header("location:index.php");

    }
    public function trash(){
$_id=$_GET['id'];
$_is_deleted=1; 



$query="UPDATE `products` SET `is_deleted`=:is_deleted WHERE `products`.`id` = :id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $_id); 
$stmt->bindParam(':is_deleted', $_is_deleted); 

$stmt->execute();
header("location:index.php");
    }
    public function trash_index(){
    

// set the PDO error mode to exception

$query="SELECT * FROM `products`WHERE is_deleted = 1 ";
$stmt=$this->conn->prepare($query);
$stmt->execute();
$products=$stmt->fetchAll();
return $products;
    
    
}
public function productdetail()
{
    $webroot="http://localhost/ecommerce_project/";

    $_id = $_GET['id'];
    $query = "SELECT * FROM `products` WHERE id=:id";
    $stmt = $this->conn->prepare($query);
     $stmt->bindParam(':id', $_id); 
    $stmt->execute();
    $products = $stmt->fetchAll();
    return $products;


}
public function newproducts(){
    $_startForm = 0;
    $_total = 4;

    $query="SELECT * FROM `products` WHERE is_new = 1 LIMIT  $_startForm,  $_total ";
    $stmt=$this->conn->prepare($query);
    $stmt->execute();
    $products=$stmt->fetchAll();
    return  $products;
 
     }


     
     public function productSearch(){

        $keywords = $_POST['keywords'] ?? ''; 
        $searchTerm = "%{$keywords}%";
    
        $query = "SELECT * FROM `products` WHERE is_deleted = 0 AND title LIKE  :keywords ";
  
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':keywords', $searchTerm);
        $stmt->execute();
        $products = $stmt->fetchAll();
       
       
        return $products;
    }


    public function categories(){
$categoryQuery = "SELECT DISTINCT category FROM products";
$categoryStmt = $conn->query($categoryQuery);
$categories = $categoryStmt->fetchAll(PDO::FETCH_COLUMN);

foreach ($categories as $category) {
    echo "<h2>$category</h2>";

    
    $productQuery = "SELECT * FROM products WHERE category = :category";
    $productStmt = $conn->prepare($productQuery);
    $productStmt->bindParam(':category', $category);
    $productStmt->execute();
    $products = $productStmt->fetchAll(PDO::FETCH_ASSOC);

    
    echo "<ul>";
    foreach ($products as $product) {
        echo "<li><a href='product-details.php?id={$product['id']}'>{$product['title']}</a></li>";
    }
    echo "</ul>";
}
    }

         
}