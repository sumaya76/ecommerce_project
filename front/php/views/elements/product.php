<!--Markup for Best Sellers-->
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");

use App\Products;


$_product = new Products();


if(array_key_exists('category_id', $_GET) && $_GET['category_id']){
  $category_id = $_GET['category_id'];
  $products = $_product->getProductsByCategoryId($category_id);
}else{
  $products = $_product->index();
}

?>
<style>
  .products .card{
    border-color:black !important;
    box-shadow: 3px;
}
.products .card .card-body .card-title a{
    text-decoration: none;
    font-size: 0.95rem;
    font-weight: normal;
    letter-spacing: 0.5px;
    color: #000;
}

.products .card .card-body .card-title a:hover{
    color: #ef4749;
}

.products .card .card-body .rating i{
    color: #fafa02;
}

.products .card .card-body .price {
    font-weight: bold;
    color: #000;
    font-size: 0.875rem;
}

.products .card .card-body p .btn{
    padding: 8px 12px;
    font-size: 11px ;
    border: 1px solid #d1d1d1;
    text-align: center;
    letter-spacing: 1px;
    color: #666;
    font-weight: bold;
    transition: all 0.3s linear;
    text-transform: uppercase;
    background: #fff;
    border-radius: 0;
}

.products .card .card-body p .btn:hover{
    background: #ef4749;
    color: #fff;
    border: 1px #ef4749 solid;
}
</style>
<section class="products">
            <div class="container">
                      
              <div class="row row-cols-1 row-cols-md-4 g-4">
             
                <?php
                if(count($products)):
                  foreach($products as $product):
                ?>
            
                <div class="col">
                  <div class="card h-100" >
                  <a href="product-details.php?id=<?= $product['id']; ?>" title="<?= $product['title']; ?>">
                        <img src="../../../../ecommerce_project/uploads/<?= $product['picture']; ?>" class="card-img-top" alt="Best Seller Image">
                    </a>

                    <div class="card-body text-center">
                     <h5 class="card-title"><a href="product-details.php?id=<?= $product['id']; ?>"><?=$product['title'];?></a></h5>
                      <p class="rating">
                      
                      </p>
                      <p class="price">&#2547;<?= $product['mrp']; ?></p> 
                      <p class="">
                        <a href="../../../admin/carts/create.php?id=<?= $product['id']; ?>" class="btn btn-danger">Add to cart</a>

                      </p>
                    </div>
                  </div>
                </div>
                <?php
                endforeach;
              else:
                  echo "<p>No product is found under this category</p>";
              endif;
                ?>
        </div>
    </div>

</section>