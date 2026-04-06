<?php 
include('db_connect.php'); 
include('header.php'); 
?>

<style>
    .hero {
        background: #3b5d50;
        padding: 6rem 0;
        color: #ffffff;
    }
    .hero h1 {
        font-weight: 700;
        font-size: 54px;
        color: #ffffff;
    }
    .hero p {
        color: rgba(255, 255, 255, 0.5);
    }
    .btn-secondary {
        background: #f9bf29;
        border-color: #f9bf29;
        color: #2f2f2f;
        border-radius: 30px;
        padding: 12px 30px;
        font-weight: 600;
    }
    .why-choose-us, .untree_co-section, .testimonial-section {
        padding: 7rem 0;
    }
    .feature h3 {
        font-size: 14px;
        color: #2f2f2f;
        font-weight: 700;
        margin-top: 20px;
    }
    .feature p {
        font-size: 14px;
        line-height: 22px;
    }
    .feature img {
        width: 40px;
    }
    .team-member img {
        border-radius: 20px;
        margin-bottom: 20px;
        transition: 0.3s;
    }
    .team-member img:hover {
        transform: scale(1.05);
    }
    .testimonial-section {
        background: #ffffff;
        text-align: center;
    }
    .newsletter-box {
        background: #ffffff;
        padding: 40px;
        border-radius: 20px;
        margin-top: -100px;
        position: relative;
        z-index: 2;
    }
    .rounded-pill {
        border-radius: 50px !important;
    }
</style>

<div class="hero">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>About Us</h1>
                    <p class="mb-4">Quality furniture designs for your dream home. We combine comfort with style to make your living space better.</p>
                    <p><a href="shop.php" class="btn btn-secondary">Shop Now</a></p>
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

<div class="why-choose-us">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title mb-4">Why Choose Us</h2>
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="feature">
                            <img src="images/truck.svg" alt="Fast Shipping">
                            <h3>Fast Shipping</h3>
                            <p>Quick and safe delivery right to your doorstep.</p>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="feature">
                            <img src="images/bag.svg" alt="Easy to Shop">
                            <h3>Easy to Shop</h3>
                            <p>Simple browsing and secure checkout process.</p>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="feature">
                            <img src="images/support.svg" alt="24/7 Support">
                            <h3>24/7 Support</h3>
                            <p>Our experts are always here to help you.</p>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="feature">
                            <img src="images/return.svg" alt="Hassle Free">
                            <h3>Hassle Free</h3>
                            <p>Easy returns if you're not happy with the product.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <img src="images/why-choose-us-img.jpg" class="img-fluid rounded-5 shadow">
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section bg-light">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-lg-5 mx-auto">
                <h2 class="section-title">Our Team</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 text-center team-member">
                <img src="images/person_1.jpg" class="img-fluid">
                <h3>Lawson Arnold</h3>
                <span class="text-muted">CEO, Founder</span>
            </div>
            <div class="col-12 col-md-6 col-lg-3 text-center team-member">
                <img src="images/person_2.jpg" class="img-fluid">
                <h3>Jeremy Walker</h3>
                <span class="text-muted">Manager</span>
            </div>
            <div class="col-12 col-md-6 col-lg-3 text-center team-member">
                <img src="images/person_3.jpg" class="img-fluid">
                <h3>Patrik White</h3>
                <span class="text-muted">Designer</span>
            </div>
            <div class="col-12 col-md-6 col-lg-3 text-center team-member">
                <img src="images/person_4.jpg" class="img-fluid">
                <h3>Kathryn Ryan</h3>
                <span class="text-muted">Support</span>
            </div>
        </div>
    </div>
</div>

<div class="testimonial-section">
    <div class="container">
        <h2 class="section-title mb-5">Testimonials</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <img src="images/person_1.jpg" width="80" height="80" class="rounded-circle mb-3 shadow">
                <p class="fst-italic text-muted mb-3" style="font-size: 1.2rem;">“Excellent quality and very comfortable furniture. The delivery was fast and the team was very helpful. Highly recommended!”</p>
                <strong>— Arman Malik</strong>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>




