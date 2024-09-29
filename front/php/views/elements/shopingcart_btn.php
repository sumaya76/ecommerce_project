<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");

use App\Carts;
$_cart= new Carts;
$carts = $_cart->index();
$grandTotal = 0;
foreach($carts as $cart)
{
    $grandTotal = $grandTotal + $cart['total_price'];
}

?>
<li class="nav-item">
    <a class="nav-link" href="shopping_cart.php">
        <button type="button" class="btn btn-danger">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="price">Cart / <span class="price_code">&#2547;</span><?php echo $grandTotal?></span>
        </button>
    </a>
</li>