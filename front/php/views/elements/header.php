<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/ecommerce_project/config.php");
session_start();

use App\Categories;
use App\Products;

$_category = new Categories();
$categories = $_category->index();
// var_dump($_SESSION);

?>
<header>
    <style>
        header .top-header {
            border-bottom: 1px solid #efefef;
        }
        header .top-header .nav-link {
            font-size: 0.625rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            border-right: 1px solid #efefef;
            color: #858585;
            display: inline-block;
            padding: 11px 10px;
            text-decoration: none;
            text-transform: uppercase;
        }
        header .middle-part {
            margin-top: 1.5rem;
            margin-bottom: 1.225rem;
        }
        header .middle-part .container .row .col-sm-2 .logo {
            margin-top: 0.7rem;
        }
        header .middle-part .container .row .col-sm-8 .nav .nav-link {
            padding: 0.625rem 0.4375rem 0.4375rem 0.4375rem;
            color: #858585;
            font-size: 0.625rem;
            font-weight: normal;
            text-transform: uppercase;
        }
        header .middle-part .container .row .col-sm-8 .nav .nav-link .form-control {
            border-radius: 0;
            background-color: #f0f0f0;
            padding: 0.7rem 1.8rem 0.7rem 0.75rem;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.5;
            color: #333;
        }
        header .middle-part .container .row .col-sm-8 .nav .nav-link .form-control::placeholder {
            color: #9a8e8e;
        }
        header .middle-part .container .row .col-sm-8 .nav .nav-link .input-group-text {
            border-radius: 0;
            background-color: #ef4749;
            border-color: transparent;
            color: #fff;
            padding: .375rem 1rem;
        }
        header .middle-part .container .row .col-sm-8 .nav .about-us {
            margin-top: 0.7rem;
            margin-right: 0.6rem;
        }
        header .middle-part .container .row .col-sm-8 .nav .nav-link .btn-danger {
            background-color: #ef4749;
            border-color: transparent;
        }
        header .middle-part .container .row .col-sm-8 .nav .nav-link .btn {
            border-radius: 0;
            color: #fff;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            line-height: 2.1rem;
            margin: 0;
            padding: 0.3rem 3.5rem 0.3rem 2.5rem;
            font-weight: 700;
            text-transform: uppercase;
        }
        header .bg-body-tertiary {
            background-color: #4a4a4a !important;
            padding-top: 0;
            padding-bottom: 0;
        }
        header .navbar .container .navbar-nav .nav-item {
            padding-left: 7px;
            padding-right: 7px;
        }
        header .navbar .container .navbar-nav .nav-link {
            font-size: 0.7rem;
            padding: 11px 0 7px;
            text-transform: uppercase;
            color: #fff;
            letter-spacing: 1px;
            transition: all 0.3s cubic-bezier(0.8, 0, 0, 1);
            border-bottom: 1px solid transparent;
            margin-top: 0.15rem;
            margin-bottom: 0.3rem;
        }
        header .navbar .container .navbar-nav .nav-item:hover {
            background-color: #f8f8f8;
        }
        header .navbar .container .navbar-nav .nav-item:hover .nav-link {
            color: #6c6c6c;
            border-bottom: 1px solid #d5cdcd;
            margin-bottom: 0.3rem;
        }
    </style>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 offset-sm-3">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="my-account.php">
                                <i class="fa-solid fa-user"></i>
                                My Account
                            </a>
                        </li>
                        <?php if (!isset($_SESSION['is_authenticated'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                    Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signUp.php">
                                <i class="fa fa-user-plus"></i>
                                    Register
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $webroot . "logout.php" ?>">
                                    <i class="fa-solid fa-unlock"></i>
                                    Logout
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    Logged By: <?php if (isset($_SESSION['username'])) {
                                                    echo $_SESSION['username'];
                                                } ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="middle-part">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="logo">
                        <a class="navbar-brand" href="index.php">
                            <img src="img/logo_title.png" alt="Logo Icon" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 offset-sm-2">
                    <ul class="nav ms-5">
                        <li class="nav-item">
                            <a class="nav-link about-us" href="aboutus.php"> About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link about-us" href="contact_us.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link about-us me-4" href="product.php">Shop</a>
                        </li>
                        <?php include_once($elements . "search.php") ?>
                        <?php include_once($elements . "shopingcart_btn.php") ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <?php foreach ($categories as $category) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php?category_id=<?php echo $category['id'] ?>"><?= $category['name'] ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
