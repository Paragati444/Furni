<?php 
/* Shop.php - Furni E-commerce Project 
   Author: Pragati
*/
include('db_connect.php'); 
include('header.php');    
?>

<div class="hero" style="background: #3b5d50; padding: 100px 0; color: #ffffff;">
    <div class="container">
        <div class="row justify-content-center"> <div class="col-lg-10 text-center"> <div class="intro-excerpt">
                    <h1 class="fw-bold display-1 mb-4" style="color: #ffffff; letter-spacing: -2px;">Shop</h1>
                    <p class="mx-auto mb-5" style="opacity: 0.9; font-size: 22px; max-width: 700px; line-height: 1.6;">
                        Explore our exclusive collection of premium furniture. High-quality designs crafted specifically for your modern home and lifestyle.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section product-section before-footer-section" style="padding: 80px 0; background: #eff2f1;">
    <div class="container">
        <div class="row">

            <?php
            // तुझे सर्व १२ प्रॉडक्ट्स
            $products = [
                ["name" => "Nordic Accent Chair", "price" => "95.00", "img" => "Product10.jfif"],
                ["name" => "Modern Executive Chair", "price" => "115.00", "img" => "Product8.jfif"],
                ["name" => "Luxury Velvet Sofa", "price" => "499.00", "img" => "Product16.jfif"],
                ["name" => "Elegant Dining Table", "price" => "320.00", "img" => "Product17.jfif"],
                ["name" => "Lounge Comfort Chair", "price" => "120.00", "img" => "Product9.jfif"],
                ["name" => "Premium Office Sofa", "price" => "350.00", "img" => "Product14.webp"],
                ["name" => "Royal Dining Set", "price" => "450.00", "img" => "Product12.jfif"],
                ["name" => "Classic Grid Interior", "price" => "85.00", "img" => "img-grid-2.jpg"],
                ["name" => "Minimalist Side Table", "price" => "45.00", "img" => "Product4.jfif"],
                ["name" => "Handcrafted Table", "price" => "150.00", "img" => "table furniture.jfif"],
                ["name" => "Ergonomic Desk Chair", "price" => "110.00", "img" => "Product6.jfif"],
                ["name" => "Sleek Stool", "price" => "55.00", "img" => "Product5.jfif"]
            ];

            foreach ($products as $product) {
                ?>
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <div class="product-card text-center" style="position: relative; transition: 0.3s;">
                        <a class="product-item" href="cart.php" style="text-decoration: none; display: block;">
                            <div class="img-box" style="background: #dce5e4; border-radius: 20px; padding: 25px; margin-bottom: 20px; height: 280px; display: flex; align-items: center; justify-content: center; overflow: hidden; position: relative;">
                                <img src="images/<?php echo $product['img']; ?>" class="img-fluid product-thumbnail" style="max-height: 100%; object-fit: contain; transition: 0.4s;">
                                
                                <span class="icon-cross" style="background: #2f2f2f; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; position: absolute; bottom: 15px; right: 15px; border-radius: 12px; opacity: 0; transition: 0.3s;">
                                    <img src="images/cross.svg" class="img-fluid" style="width: 14px;">
                                </span>
                            </div>
                            
                            <h3 class="product-title" style="font-weight: 600; font-size: 16px; color: #2f2f2f;"><?php echo $product['name']; ?></h3>
                            <strong class="product-price" style="font-weight: 800; font-size: 18px; color: #3b5d50;">$<?php echo $product['price']; ?></strong>
                        </a>
                    </div>
                </div> 
                <?php 
            } 
            ?>

        </div>
    </div>
</div>

<style>
    /* Premium Hover Style */
    .product-card:hover .product-thumbnail { transform: scale(1.08); }
    .product-card:hover .img-box { background: #cedbd9; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
    .product-card:hover .icon-cross { opacity: 1; transform: translateY(-5px); }
</style>

<?php include('footer.php'); ?>