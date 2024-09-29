<?php

namespace App;
use pdo;

class Categories
{
    public $id = null;



    public $conn = null;


    public function __construct(){
        //Connection to Database
        $servername = "localhost";
        $username = "root";
        $password = "";

        $this->conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function store(){

        $_name = $_POST['name'];
        $_link = $_POST['link'];
        $_created_at = date (" Y-m-d H:i:s" );
       
        


        //Insert Query
        $query = "INSERT INTO `categories` (`name`, `link`,`created_at`) VALUES (:name, :link, :created_at)";


        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(':name', $_name);
        $stmt->bindParam(':link', $_link);
     
        $stmt->bindParam(':created_at', $_created_at);

       
        $result = $stmt->execute();

        header("location:index.php");
    }


 
  


    public function index(){

        //Insert Query
        $query = "SELECT * FROM `categories`";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        $categories = $stmt->fetchAll();

        return $categories;

    }




    public  function show(){

        $_id = $_GET['id'];

        $query = "SELECT * FROM `categories` WHERE id= :id";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $Category = $stmt->fetch();
        return $Category;


    }

    public function edit(){
        $_id = $_GET['id'];

        $query = "SELECT * FROM `categories` WHERE id= :id";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $Category = $stmt->fetch();
        return $Category;
    }

    public function update(){
        $approot = $_SERVER['DOCUMENT_ROOT']."/ecommerce_project/";
        //Working with image
       
        $_id = $_POST['id'];
        
        $_name = $_POST['name'];
        $_link = $_POST['link'];
        $_modified_at = date (" Y-m-d H:i:s" );

        //Insert Query
        $query = "UPDATE `categories` SET `name` = :name, `link` = :link, `modified_at` = :modified_at
         WHERE `categories`.`id` = :id";


        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(':id', $_id);
    
        $stmt->bindParam(':name', $_name);
        $stmt->bindParam(':link', $_link);
        $stmt->bindParam(':modified_at', $_modified_at);
        $result = $stmt->execute();

        header("location:index.php");

    }

    public function delete(){
        $_id = $_GET['id'];

        $query = "DELETE FROM categories WHERE `categories`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();
        //var_dump($result);
        header("location:index.php");

    }

}