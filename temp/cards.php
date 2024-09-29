<?php


 include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");
 use App\Banners;
 $_banner = new Banners ();
 $banners= $_banner->getActiveBanners();
 

?>
<?php


include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");
use App\Products;
$_product = new Products ();
$products= $_product->getActiveBestProduct();
$Activeproducts= $_product->getActiveProduct();


?>




<header>
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $_active ="active";
                    foreach($banners as $_banner):
                        
                    
                    
                    ?>
                    <div class="carousel-item active <?=$_active?>">
                        <img src="<?= $webroot;?>uploads/<?= $_banner['picture'];?>" class="d-block h-700 w-100" alt="..." />
                    </div>

                  
                    <?php
                    $_active= "";
                    endforeach

                    ?>
                   
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
          
        </header>

        <!--cart-->

        <div class="bg-light">
        <p class="text-primary  text-center text-uppercase mb-2">// BAKERY PRODUCTS</p>

        <div class="h2 text-danger text-center pt-2 ">
                     Explore The Categories Of Our Bakery Products</div>

        <div class="row m-3 pt-2">
        <?php
                    $_active ="active";
                    foreach($products as $_product):
                        
                    
                    
                    ?>
            <div class="col-lg-3 mt-2  ">
                <div class="card bg-white" style="width: 17.6rem;">
                   <a href="products_detail.php?id=<?= $_product['id']?>"><img src="<?= $webroot;?>uploads/<?= $_product['picture'];?>" class="card-img-top c-img" alt="..." /></a> 
                  
                  
                    <div class="card-body" style="padding-top:2px;padding-bottom:3px;">
                       <a class="text-decoration-none text-dark" href="products_detail.php?id=<?= $_product['id']?>"> <h4 class="card-title text-center"><?= $_product['title'];?></h4></a>
                        <p class="card-title text-center"><?= $_product['description'];?></p>
                        <p class="card-text text-center "><?= $_product['mrp'];?></p>
                        <a href="../../../admin/carts/cart-create.php?pid=<?= $_product['id'];?>" class="btn btn-outline-danger float-center d-grid gap-2 col-6 mx-auto">Add to cart</a>
                    </div>
                      
                  
                </div>
            </div>

            <?php
                    $_active= "";
                    endforeach

                    ?>


            

           

        </div>

        </div>


