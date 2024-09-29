<!--Markup for Best Sellers-->
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");

use App\Products;


$_product = new Products();
$products = $_product->productSearch();
?>
<section class="products">
            <div class="container">
                      
              <div class="row row-cols-1 row-cols-md-4 g-4">
             
                <?php
                  foreach($products as $product):
                ?>
            
                <div class="col">
                  <div class="card h-100">
                  <a href="product-details.php?id=<?= $product['id']; ?>" title="<?= $product['title']; ?>">
                        <img src="../../../../ecommerce_project/uploads/<?= $product['picture']; ?>" class="card-img-top" alt="Best Seller Image">
                    </a>

                    <div class="card-body text-center">
                     <h5 class="card-title"><a href="product-details.php?id=<?= $product['id']; ?>"><?=$product['title'];?></a></h5>
                      <p class="rating">
                       
                      </p>
                      <p class="price">&#2547;<?= $product['mrp']; ?></p> 
                      <p class="">
                        <button type="button" class="btn btn-danger">Add to cart</button>
                      </p>
                    </div>
                  </div>
                </div>
                <?php
                endforeach;
                ?>
        </div>
    </div>

</section>



