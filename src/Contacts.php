<?php

namespace App;
use pdo;


class Contacts
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

   
        $_email = $_POST['email'];
        $_details = $_POST['details'];
        


        //Insert Query
        $query = "INSERT INTO `contacts` (`email`, `details`) VALUES (:email, :details)";


        $stmt = $this->conn->prepare($query);


      
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':details', $_details);
        
        $result = $stmt->execute();

        header("location:http://localhost/ecommerce_project/");
    }


 

 


    public function index(){

        //Insert Query
        $query = "SELECT * FROM `contacts`";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        $contacts = $stmt->fetchAll();

        return $contacts;

    }




    public  function show(){

        $_id = $_GET['id'];

        $query = "SELECT * FROM `contacts` WHERE id= :id";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $contact = $stmt->fetch();
        return $contact;


    }

 


    public function delete(){
        $_id = $_GET['id'];

        $query = "DELETE FROM contacts WHERE `contacts`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();
        //var_dump($result);
        header("location:index.php");

    }

}