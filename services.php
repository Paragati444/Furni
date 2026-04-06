<?php 
/* Services.php - Furni Project */
include('db_connect.php'); // डेटाबेस कनेक्शन
include('header.php');     // हेडर फाईल
?>

<div class="hero" style="background: #3b5d50; padding: 6rem 0; color: #ffffff;">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1 style="font-weight: 700; font-size: 54px; color: #ffffff;">Services</h1>
                    <p class="mb-4" style="color: rgba(255, 255, 255, 0.7);">Quality furniture solutions tailored for your comfort. We offer the best shipping, support, and return policies in the industry.</p>
                    <p>
                        <a href="shop.php" class="btn btn-secondary me-2" style="background: #f9bf29; border-color: #f9bf29; color: #2f2f2f; border-radius: 30px; padding: 12px 30px; font-weight: 600;">Shop Now</a>
                        <a href="#" class="btn btn-outline-white-white" style="border: 2px solid rgba(255, 255, 255, 0.3); color: #ffffff; border-radius: 30px; padding: 12px 30px; text-decoration: none;">Explore</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="images/couch.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="why-choose-section" style="padding: 7rem 0;">
    <div class="container">
        <div class="row my-5">
            <?php
            $services = [
                ["title" => "Fast & Free Shipping", "icon" => "truck.svg"],
                ["title" => "Easy to Shop", "icon" => "bag.svg"],
                ["title" => "24/7 Support", "icon" => "support.svg"],
                ["title" => "Hassle Free Returns", "icon" => "return.svg"],
                ["title" => "Secure Payment", "icon" => "truck.svg"], // आयकॉन बदलू शकतेस
                ["title" => "Expert Design", "icon" => "bag.svg"],
                ["title" => "Quality Material", "icon" => "support.svg"],
                ["title" => "Global Delivery", "icon" => "return.svg"]
            ];

            foreach ($services as $service) {
            ?>
                <div class="col-6 col-md-6 col-lg-3 mb-4">
                    <div class="feature">
                        <div class="icon mb-3">
                            <img src="images/<?php echo $service['icon']; ?>" alt="Image" style="width: 40px;">
                        </div>
                        <h3 style="font-size: 15px; font-weight: 700; color: #2f2f2f;"><?php echo $service['title']; ?></h3>
                        <p style="font-size: 14px; line-height: 22px; color: #6a6a6a;">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="product-section pt-0" style="padding-bottom: 7rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title" style="font-size: 32px; font-weight: 700; color: #2f2f2f;">Crafted with excellent material.</h2>
                <p class="mb-4" style="color: #6a6a6a;">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet.</p>
                <p><a href="shop.php" class="btn btn-dark" style="background: #2f2f2f; border-radius: 30px; padding: 10px 25px;">Explore More</a></p>
            </div> 

            <?php 
            $featured = [
                ["name" => "Nordic Chair", "price" => "50.00", "img" => "product-1.png"],
                ["name" => "Kruzo Aero Chair", "price" => "78.00", "img" => "product-2.png"],
                ["name" => "Ergonomic Chair", "price" => "43.00", "img" => "product-3.png"]
            ];
            foreach ($featured as $f_item) {
            ?>
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="shop.php" style="text-decoration: none; display: block; text-align: center;">
                    <img src="images/<?php echo $f_item['img']; ?>" class="img-fluid product-thumbnail" style="margin-bottom: 20px;">
                    <h3 class="product-title" style="color: #2f2f2f; font-weight: 600;"><?php echo $f_item['name']; ?></h3>
                    <strong class="product-price" style="color: #2f2f2f; font-weight: 800;">$<?php echo $f_item['price']; ?></strong>
                    <span class="icon-cross" style="display: block; margin-top: 15px;">
                        <img src="images/cross.svg" class="img-fluid" style="width: 30px;">
                    </span>
                </a>
            </div> 
            <?php } ?>
        </div>
    </div>
</div>

<div class="testimonial-section" style="padding: 7rem 0; background: #ffffff; text-align: center; border-top: 1px solid #eff2f1;">
    <div class="container">
        <h2 class="section-title mb-5" style="font-weight: 700;">Testimonials</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <img src="images/person_1.jpg" width="80" height="80" class="rounded-circle mb-3 shadow" style="border: 3px solid #f9bf29;">
                <p class="fst-italic text-muted mb-3" style="font-size: 1.2rem; line-height: 1.8;">“Excellent quality and very comfortable furniture. The delivery was fast and the team was very helpful. Highly recommended!”</p>
                <strong style="color: #2f2f2f; font-size: 1.1rem;">— Arman Malik</strong>
                <p class="text-muted small">Happy Customer</p>
            </div>
        </div>
    </div>
</div>

<?php 
include('footer.php'); // फुटर फाईल
?>