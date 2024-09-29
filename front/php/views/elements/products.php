<!--Markup for Best Sellers-->
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");
use App\Products;

$_product = new Products();
$products = $_product->getActiveProducts();
$newproducts = $_product->newproducts();

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
              <h2 class="text-uppercase">Best <span>Sellers</span></h2>
          
              <div class="row row-cols-1 row-cols-md-4 g-4">
             
                <?php
                  foreach($products as $product):
                ?>
                

                <div class="col">
                  <div class="card h-100 ">
                  <a href="product-details.php?id=<?=$product['id'];?>" title="<?=$product['title'];?>">
                                <img src="<?=$webroot;?>uploads/<?=$product['picture'];?>" class="card-img-top" alt="Best Seller Image">
                            </a>
                    <div class="card-body text-center">
                     <h5 class="card-title"><a href="product-details.php"><?=$product['title'];?></a></h5>
                      <p class="rating">
                        
                      </p>
                      <p class="price">&#2547;<?= $product['mrp']; ?></p> 
                      <p class="">
                        <a href="../../../admin/carts/create.php?id=<?= $product['id']; ?>">
                        <button type="button" class="btn btn-danger">Add to cart</button>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <?php
                endforeach;
                ?>

            <!-- <div class="col">
                <div class="card h-100">
                    <a href="#" title="CiplaPlast Multipurpose Chair"><img src="img/product1-266x280.jpg" class="card-img-top" alt="Best Seller Image"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="#">CiplaPlast Multipurpose Chair</a></h5>
                        <p class="rating">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </p>
                        <p class="price">&dollar;20.00</p>
                        <p class="">
                            <button type="button" class="btn btn-danger">Add to cart</button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <a href="#" title="CiplaPlast Multipurpose Chair"><img src="img/product1-266x280.jpg" class="card-img-top" alt="Best Seller Image"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="#">CiplaPlast Multipurpose Chair</a></h5>
                        <p class="rating">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </p>
                        <p class="price">&dollar;20.00</p>
                        <p class="">
                            <button type="button" class="btn btn-danger">Add to cart</button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <a href="#" title="CiplaPlast Multipurpose Chair"><img src="img/product1-266x280.jpg" class="card-img-top" alt="Best Seller Image"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="#">CiplaPlast Multipurpose Chair</a></h5>
                        <p class="rating">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </p>
                        <p class="price">&dollar;20.00</p>
                        <p class="text-center">
                            <button type="button" class="btn btn-danger">Add to cart</button>
                        </p>
                    </div>
                </div>
            </div>-->
        </div>
    </div>

</section>
<section><br>
<div class="banner-bottom">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="banner__pic">
                  <img src="img/bannerdown2.jpg" alt="bannerdown">
              </div>
          </div>
        
      </div>
  </div>
</div>

  
</section>
<!--Markup for New Products-->
<section class="products">
    <div class="container">
        <h2 class="text-uppercase">New <span>Products</span></h2>

        <div class="row row-cols-1 row-cols-md-4 g-4">
        

<?php foreach($newproducts as $newproduct): ?>

    <div class="col">
                  <div class="card h-100">
                  <a href="product-details.php?id=<?=$newproduct['id'];?>" title="<?=$newproduct['title'];?>">
                                <img src="<?=$webroot;?>uploads/<?=$newproduct['picture'];?>" class="card-img-top" alt="Best Seller Image">
                            </a>
                    <div class="card-body text-center">
                     <h5 class="card-title"><a href="product-details.php"><?=$newproduct['title'];?></a></h5>
                      <p class="rating">
                       
                      </p>
                      <p class="price">&#2547;<?= $newproduct['mrp']; ?></p> 
                      <p class="">
                      <a href="../../../admin/carts/create.php?id=<?=$newproduct['id']; ?>">
                        <button type="button" class="btn btn-danger">Add to cart</button>
                        </a>
                    </div>
                  </div>
                </div>
                <?php
                endforeach;
                ?>
              </div>
            </div>
          
          </section><div>&nbsp;</div>

          <section>
 
          
</div>
</section>
