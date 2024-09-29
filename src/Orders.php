<?php

namespace App;

use pdo;

session_start();
if (!isset($_SESSION['is_authenticated'])) {
    $current_url = $_SERVER['REQUEST_URI'];
    header("location: ./../../front/php/public/login.php?previous_url=$current_url");
}

class Orders
{
    public $id = null;



    public $conn = null;


    public function __construct()
    {
        //Connection to Database
        $servername = "localhost";
        $username = "root";
        $password = "";

        $this->conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function store()
    {
        $getProducts = $this->getProductsFromCart($_SESSION['user_id']);
        if ($getProducts) {
            foreach ($getProducts as $getPorduct) {

                $_product_id = $getPorduct['product_id'];
                $_title = $getPorduct['title'];
                $_quantity = $getPorduct['quantity'];
                $_user_id = $getPorduct['user_id'];
                $_total_price = $getPorduct['total_price'];
                $_invoice_number = "INV" . $_user_id . date('d-m-y');
                $_address = $_POST['address'] ?? null;
                $query = "INSERT INTO `orders` (`product_id`, `title`, `quantity`, `user_id`, `grand_total`, `address`, `invoice_number`) VALUES (:product_id, :title, :quantity, :user_id, :total_price, :address, :invoice_number)";
                
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':product_id', $_product_id);
                $stmt->bindParam(':title', $_title);
                $stmt->bindParam(':quantity', $_quantity);
                $stmt->bindParam(':user_id', $_user_id);
                $stmt->bindParam(':address', $_address);
                $stmt->bindParam(':total_price', $_total_price);
                $stmt->bindParam(':invoice_number', $_invoice_number);
                $result = $stmt->execute();
                if ($result) {
                    $_id = $getPorduct['id'];
                    //Insert Query
                    $query = "UPDATE `carts` SET `is_ordered` = 1 WHERE `carts`.`id` = :id";
                    $stmt = $this->conn->prepare($query);
                    $stmt->bindParam(':id', $_id);
                    $stmt->execute();
                }
            }
        }else{
            $_product_id = $_POST['product_id'];
            $_title = $_POST['title'];
            $_quantity = $_POST['quantity'];
            $_user_id = $_POST['user_id'];
    
            $_grand_total = $_POST['grand_total'];
    
            $_invoice_number = "INV" . $_user_id . date('d-m-y');
    
            $_address = $_POST['address'];
            
            $_invoice_number = $_POST['invoice_number'];
            //Insert Query
            $query = "INSERT INTO `orders` (`product_id`, `title`, `quantity`,`user_id`,`grand_total`,`address`,`invoice_number`) VALUES (:product_id, :title, :quantity, :user_id, :grand_total, :address ,invoice_number)";
    
    
            $stmt = $this->conn->prepare($query);
    
    
            $stmt->bindParam(':product_id', $_product_id);
            $stmt->bindParam(':title', $_title);
            $stmt->bindParam(':quantity', $_quantity);
            $stmt->bindParam(':user_id', $_user_id);
            $stmt->bindParam(':grand_total', $_grand_total);
            $stmt->bindParam(':address', $_address);
            $stmt->bindParam(':invoice_number', $_invoice_number);
    
            $result = $stmt->execute();

        }


        header("location: ./../../front/php/views/elements/thanks.php");
        // header('http://localhost:80/ecommerce_project/front/php/views/elements/thanks.php');
    }


    public function getProductsFromCart($userId)
    {
        $query = "SELECT * FROM `carts` WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll();
    }



    public function index()
    {

        //Insert Query
        $query = "SELECT * FROM `orders`";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        $orders = $stmt->fetchAll();

        return $orders;
    }




    public  function show()
    {

        $_id = $_GET['id'];

        $query = "SELECT * FROM `orders` WHERE id= :id";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $order = $stmt->fetch();
        return $order;
    }

    public function edit()
    {
        $_id = $_GET['id'];

        $query = "SELECT * FROM `orders` WHERE id= :id";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $order = $stmt->fetch();
        return $order;
    }

    public function update()
    {
        $approot = $_SERVER['DOCUMENT_ROOT'] . "/ecommerce_project/";
        //Working with image

        $_id = $_POST['id'];
        $_product_id = $_POST['product_id'];
        $_title = $_POST['title'];
        $_quantity = $_POST['quantity'];
        $_user_id = $_POST['user_id'];

        $_grand_total = $_POST['grand_total'];


        $_address = $_POST['address'];

     
        //Insert Query
        $query = "UPDATE `orders` SET `product_id` = :product_id, `title` = :title, `quantity` = :quantity ,`user_id` = :user_id ,
         ,`user_id` = :user_id  ,`grand_total` = :grand_total ,`address` = :address  WHERE `orders`.`id` = :id";


        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(':id', $_id);

        $stmt->bindParam(':product_id', $_product_id);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':quantity', $_quantity);
        $stmt->bindParam(':user_id', $_user_id);
        $stmt->bindParam(':grand_total', $_grand_total);
        $stmt->bindParam(':address', $_address);
        $_user_id = $_POST['user_id'];

        $_grand_total = $_POST['grand_total'];


        $_address = $_POST['address'];

        $result = $stmt->execute();

        header("location:index.php");
    }

    public function delete()
    {
        $_id = $_GET['id'];

        $query = "DELETE FROM orders WHERE `orders`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();
        //var_dump($result);
        header("location:index.php");
    }
}
