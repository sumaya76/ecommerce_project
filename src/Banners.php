<?php
namespace App;
use PDO;
class Banners{
    public $id=null;
    public $title=null;
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

   $query="SELECT * FROM `banners` WHERE is_deleted= 0 ";
   $stmt=$this->conn->prepare($query);
   $stmt->execute();
   $banners=$stmt->fetchAll();
   return  $banners;

    }
    public function getActiveBanners(){
        $_startForm = 0;
        $_total = 5;

        $query="SELECT * FROM `banners` WHERE is_active = 1 LIMIT  $_startForm,  $_total ";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $banners=$stmt->fetchAll();
        return  $banners;
     
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
        $_link = $_POST['link'];
        $_promotional_message = $_POST['promotional_message'];
        $_hTML_Banner = $_POST['hTML_Banner'];
        
        if(array_key_exists('is_active', $_POST)){
            $_is_active = $_POST['is_active'];
        }else{
            $_is_active = 0;
        }
        
        $_created_at = date (" Y-m-d H:i:s" );
        

        $query = "INSERT INTO `banners` (`title`, `link`, `promotional_message`,`hTML_Banner`,`picture`,`is_active`,`created_at`)
        VALUES (:title, :link, :promotional_message, :hTML_Banner, :picture, :is_active, :created_at)";
       

$stmt=$this->conn->prepare($query);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':link', $_link);
$stmt->bindParam(':promotional_message', $_promotional_message);
$stmt->bindParam(':hTML_Banner', $_hTML_Banner);
$stmt->bindParam(':picture', $_picture);
$stmt->bindParam(':is_active', $_is_active);
$stmt->bindParam(':created_at', $_created_at);

$result=$stmt->execute();

header("location:index.php");
    }

    public function show(){


   $_id=$_GET['id'];


$query="SELECT * FROM `banners`WHERE id=:id";
$stmt=$this->conn->prepare($query);
$stmt->bindParam(':id',$_id);
$stmt->execute();
$banner=$stmt->fetch();
return $banner;
    }

    public function edit(){
    $_id=$_GET['id'];



$query="SELECT * FROM `banners`WHERE id=:id";
$stmt=$this->conn->prepare($query);
$stmt->bindParam(':id',$_id);
$stmt->execute();
$banner=$stmt->fetch();
return $banner;
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
        
        
        
        $_id = $_POST['id'];
        $_title = $_POST['title'];
        $_link = $_POST['link'];
        $_promotional_message= $_POST['promotional_message'];
        $_hTML_Banner = $_POST['hTML_Banner'];
        if(array_key_exists('is_active', $_POST)){
            $_is_active = $_POST['is_active'];
        }else{
            $_is_active = 0;
        }
        
        $_modified_at = date (" Y-m-d H:i:s" );





        $query = "UPDATE `banners` SET `title` = :title, `link` = :link, `promotional_message` = :promotional_message,`hTML_Banner` = :hTML_Banner,
        `is_active` = :is_active,`picture` = :picture, `modified_at` = :modified_at WHERE `banners`.`id` = :id";
     
     $stmt=$this->conn->prepare($query);
       
       
       $stmt->bindParam(':id', $_id);
       $stmt->bindParam(':title', $_title);
       $stmt->bindParam(':link', $_link);
       $stmt->bindParam(':promotional_message', $_promotional_message);
       $stmt->bindParam(':hTML_Banner', $_hTML_Banner);
       $stmt->bindParam(':is_active', $_is_active);
       $stmt->bindParam(':picture', $_picture);
       $stmt->bindParam(':modified_at', $_modified_at);
       $result = $stmt->execute();
       
var_dump($result);

header("location:index.php");
    }

    public function delete(){
    $_id=$_GET['id'];

    
    $query="DELETE FROM banners WHERE `banners`.`id` = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $_id); 
    $stmt->execute();
    header("location:index.php");

    }

    public function restore(){

    $_id=$_GET['id'];
    $_is_deleted= 0;
    
    
    
    $query="UPDATE `banners` SET `is_deleted`=:is_deleted WHERE `banners`.`id` = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $_id); 
    $stmt->bindParam(':is_deleted', $_is_deleted); 
    $stmt->execute();
    header("location:index.php");

    }
    public function trash(){
$_id=$_GET['id'];
$_is_deleted=1; 



$query="UPDATE `banners` SET `is_deleted`=:is_deleted WHERE `banners`.`id` = :id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $_id); 
$stmt->bindParam(':is_deleted', $_is_deleted); 

$stmt->execute();
header("location:index.php");
    }
    public function trash_index(){
    

// set the PDO error mode to exception

$query="SELECT * FROM `banners`WHERE is_deleted = 1 ";
$stmt=$this->conn->prepare($query);
$stmt->execute();
$banners=$stmt->fetchAll();
return $banners;
    }

}