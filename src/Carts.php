<?php

namespace App;

use PDO;

class Carts
{
    public $id = null;
    public $title = null;
    public $product_id = null;

    public $quantity = null;
    public $unit_price = null;
    public $total_price = null;
    public $conn = null;

    public function __construct()

    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $this->conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function index()
    {

        $query = "SELECT * FROM `carts` WHERE `is_ordered` = 0 ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $carts = $stmt->fetchAll();
        return  $carts;
    }

    public function store()
    {

        // var_dump($_POST);
        $_product_id = $_POST['product_id'];
        $_user_id = $_POST['user_id'];
        $_title = $_POST['title'];
        $_mrp = intval($_POST['mrp']);
        $_quantity = intval($_POST['quantity']);
        $_picture = $_POST['picture'];
        $_total_price = $_mrp * $_quantity;
        $getCartProduct = $this->getCartProduct($_product_id, $_user_id);
        if ($getCartProduct) {
            // var_dump($_POST);
            $_id = $getCartProduct['id'];
            $_quantity = $_POST['quantity'];
            $updatedTotalPrice = $getCartProduct['total_price'] + $_total_price;
            $updatedQty = $getCartProduct['quantity'] + $_quantity;
            $query = "UPDATE `carts` SET `total_price` = :total_price, `quantity` = :quantity WHERE `carts`.`id` = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $_id);
            $stmt->bindParam(':total_price', $updatedTotalPrice);
            $stmt->bindParam(':quantity', $updatedQty);
            $result = $stmt->execute();
        }else{
            $query = "INSERT INTO `carts` (`product_id`,`user_id`, `title`, `mrp`,`total_price`,`quantity`,`picture`)
            VALUES (:product_id, :user_id, :title,  :mrp, :total_price, :quantity, :picture)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':product_id', $_product_id);
            $stmt->bindParam(':user_id', $_user_id);
            $stmt->bindParam(':title', $_title);
            $stmt->bindParam(':mrp', $_mrp);
            $stmt->bindParam(':total_price', $_total_price);
            $stmt->bindParam(':quantity', $_quantity);
            $stmt->bindParam(':picture', $_picture);
            $result = $stmt->execute();
        }




        header("location: http://localhost/ecommerce_project/front/php/public/shopping_cart.php");
    }

    public function getCartProduct($productId, $_user_id)
    {
        $query = "SELECT * FROM `carts` WHERE product_id = :productId AND user_id = :user_id AND is_ordered = 0";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':productId', $productId);
        $stmt->bindParam(':user_id', $_user_id);
        $stmt->execute();
        $cart = $stmt->fetch();
        // var_dump($cart);
        return $cart;
    }

    public function show()
    {


        $_id = $_GET['id'];


        $query = "SELECT * FROM `carts`WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $cart = $stmt->fetch();
        return $cart;
    }

    public function edit()
    {
        $_id = $_GET['id'];



        $query = "SELECT * FROM `carts`WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $cart = $stmt->fetch();
        return $cart;
    }

    public function update()
    {
        $approot = $_SERVER['DOCUMENT_ROOT'] . "/ecommerce_project/";
        //Working with image
        if ($_FILES['picture']['name'] != "") {
            $file_name = "IMG" . time() . "_" . $_FILES['picture']['name'];

            $target = $_FILES['picture']['tmp_name'];

            $destination = $approot . 'uploads/' . $file_name;

            $is_file_move = move_uploaded_file($target, $destination);

            if ($is_file_move) {
                $_picture = $file_name;
            } else {
                $_picture = null;
            }
        } else {
            $_picture = $_POST['old_picture'];
        }



        $_id = $_POST['id'];
        $_product_id = $_POST['product_id'];
        $_user_id = $_POST['user_id'];
        $_title = $_POST['title'];

        $_unit_price = $_POST['unit_price'];
        $_total_price = $_POST['total_price'];
        $_quantity = $_POST['quantity'];








        $query = "UPDATE `carts` SET `product_id` = :product_id,`user_id` = :user_id,`title` = :title,`unit_price` = :unit_price,`total_price` = :total_price,
        `quantity` = :quantity,`picture` = :picture WHERE `carts`.`id` = :id";

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':product_id', $_product_id);
        $stmt->bindParam(':user_id', $_user_id);
        $stmt->bindParam(':title', $_title);

        $stmt->bindParam(':unit_price', $_unit_price);
        $stmt->bindParam(':total_price', $_total_price);
        $stmt->bindParam(':quantity', $_quantity);
        $stmt->bindParam(':picture', $_picture);

        $result = $stmt->execute();

        var_dump($result);

        header("location:index.php");
    }


    public function delete()
    {

        $_id = $_POST['cart_id'];
        //die($_id);
        $query = "DELETE FROM carts WHERE `carts`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();
        //var_dump($result);
        header("location:http://localhost/ecommerce_project/front/php/public/shopping_cart.php");
    }
}
