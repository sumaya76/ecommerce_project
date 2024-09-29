<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");
 use App\Carts;
 $_cart = new Carts ();
 $carts= $_cart->index();
?>




<section class="payment_methode_section pt-4">
            <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Your Card</h3>
                        

                    
                        <div class="card">

                            <table class="table table-bordered table-white">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Title</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col"> Qutantity</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>

                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $totalPrice = 0;
                                  foreach($carts as $cart):
                                    $totalPrice = $totalPrice + $cart['total_price'];
                                ?>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td><?=$cart['product_title'];?></td>
                                    <td><img src="<?= $webroot;?>uploads/<?= $cart['picture'];?>" alt="img" style="height:50px;width:50px"></td>
                                    <td><?=$cart['qty'];?></td>
                                    <td><?=$cart['unite_price'];?></td>
                                    <td><?=$cart['total_price'];?></td>
                                    <td><form action="cart_delete.php" method="POST">
                                      <button class="btn btn-primary" type="submit">Delete</button>
                                      <input type="hidden" name="cart_id" value="<?=$cart['id'];?>">
                                      </form>
                                    </td>
                                    
                                  </tr>
                                  <?php
                                    endforeach
                                  ?>


                                
                                  <tr>
                                    <td colspan="5">Total Price</td>
                           
                                    <td><?=$totalPrice?></td>
                                    <td></td>

                                  </tr>
                                </tbody>
                              </table>
                            </div>
                    </div>

                    <div class="row p-4">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                  <td>
                                     <a href="checkout.php?total_price=<?=$cart['total_price'];?>">
                                      <button class="btn btn-primary" type="submit"> Proceed to Checkout</button>
                                    </a> 
                                  </td>
                                </div>
                                <div class="col-6"><td><button class="btn btn-primary" type="submit">Order</button></td></div>
                                
                                

                            </div>


                        </div>

                    </div>


                   




                </div>

            </div>





        </section>
