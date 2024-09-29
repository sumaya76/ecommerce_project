<?php

namespace App;
use pdo;
session_start();
if (!isset($_SESSION['is_authenticated'])) {
    header("location: ./../../front/php/public/login.php");
}
class Users
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

        $_first_name = $_POST['first_name'];
        $_last_name = $_POST['last_name'];
        $_email = $_POST['email'];
        $_phone_number = $_POST['phone_number'];
        $_user_name = $_POST['user_name'];
        $_address = $_POST['address'];
        $_shipping_address = $_POST['shipping_address'];
        $_password = $_POST['password'];


        //Insert Query
        $query = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `phone_number`, `user_name`,`address`,`shipping_address`, `password`) VALUES (:first_name, :last_name, :email, :phone_number, :user_name, :address, :shipping_address, :password)";


        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(':first_name', $_first_name);
        $stmt->bindParam(':last_name', $_last_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':phone_number', $_phone_number);
        $stmt->bindParam(':user_name', $_user_name);
        $stmt->bindParam(':address', $_address);
        $stmt->bindParam(':shipping_address', $_shipping_address);
        $stmt->bindParam(':password', $_password);

        $result = $stmt->execute();

        header("location:index.php");
    }


    public function signUp(){

        $webroot = "http://localhost/ecommerce_project/";

        $_first_name = $_POST['first_name'];
        $_last_name = $_POST['last_name'];
        $_email = $_POST['email'];
        $_phone_number = $_POST['phone_number'];
        $_user_name = $_POST['user_name'];
        $_address = $_POST['address'];
        $_shipping_address = $_POST['shipping_address'];
        $_password = $_POST['password'];


        //Insert Query
        $query = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `phone_number`, `user_name`,`address`,`shipping_address`, `password`) VALUES (:first_name, :last_name, :email, :phone_number, :user_name, :address, :shipping_address,:password)";


        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(':first_name', $_first_name);
        $stmt->bindParam(':last_name', $_last_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':phone_number', $_phone_number);
        $stmt->bindParam(':user_name', $_user_name);
        $stmt->bindParam(':address', $_address);
        $stmt->bindParam(':shipping_address', $_shipping_address);
        $stmt->bindParam(':password', $_password);

        $result = $stmt->execute();

        header("location:".$webroot."front/php/public/login.php");
    }

    public function login(){
        session_start();
        $webroot="http://localhost/ecommerce_project/";
        $_user_name = $_POST['user_name'];
        $_password = $_POST['password'];
       
        $query = "SELECT COUNT(*) AS total FROM `users` WHERE user_name=:user_name AND password = :password";

        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_name', $_user_name);
        $stmt->bindParam(':password', $_password);

        $stmt->execute();
        $total_found = $stmt->fetch();


        if($total_found['total'] > 0){
            $_SESSION['is_authenticated'] = true;

            header("location:".$webroot."admin/dashboard.php");
        }else{
            $_SESSION['is_authenticated'] = false;

            header("location:".$webroot."404.php");

        }





    }


    public function index(){

        //Insert Query
        $query = "SELECT * FROM `users`";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        $users = $stmt->fetchAll();

        return $users;

    }




    public  function show(){

        $_id = $_GET['id'];

        $query = "SELECT * FROM `users` WHERE id= :id";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $user = $stmt->fetch();
        return $user;


    }

    public function edit(){
        $_id = $_GET['id'];

        $query = "SELECT * FROM `users` WHERE id= :id";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $user = $stmt->fetch();
        return $user;
    }

    public function update(){
        $approot = $_SERVER['DOCUMENT_ROOT']."/ecommerce_project/";
        //Working with image
       
        $_id = $_POST['id'];
        $_first_name = $_POST['first_name'];
        $_last_name = $_POST['last_name'];
        $_email = $_POST['email'];
        $_phone_number = $_POST['phone_number'];
        $_user_name = $_POST['user_name'];
       
        $_address = $_POST['address'];
        $_shipping_address = $_POST['shipping_address'];
        $_password = $_POST['password'];


        //Insert Query
        $query = "UPDATE `users` SET `first_name` = :first_name, `last_name` = :last_name, `email` = :email, `phone_number` = :phone_number,`user_name` = :user_name,`address` = :address,`shipping_address` = :shipping_address,`password` = :password
         WHERE `users`.`id` = :id";


        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':first_name', $_first_name);
        $stmt->bindParam(':last_name', $_last_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':phone_number', $_phone_number);
        $stmt->bindParam(':user_name', $_user_name);
        $stmt->bindParam(':address', $_address);
        $stmt->bindParam(':shipping_address', $_shipping_address);
        $stmt->bindParam(':password', $_password);

        $result = $stmt->execute();

        header("location:index.php");

    }

    public function delete(){
        $_id = $_GET['id'];

        $query = "DELETE FROM users WHERE `users`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();
        //var_dump($result);
        header("location:index.php");

    }

}