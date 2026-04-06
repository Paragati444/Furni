<?php 
// 1. Include database connection and header
include('db_connect.php'); 
include('header.php'); 

// 2. Start session to handle user greetings
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furni - Modern Interior Design</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* --- Global & Section 1: Hero --- */
        body { font-family: 'Inter', sans-serif; background-color: #eff2f1; overflow-x: hidden; }
        .hero { background: #3b5d50; padding: 100px 0; color: white; }
        .hero h1 { font-size: 52px; font-weight: 700; line-height: 1.2; }
        .btn-warning { background: #f9bf29; border: none; border-radius: 30px; padding: 12px 30px; font-weight: 600; color: #2f2f2f; text-decoration: none; display: inline-block; }
        .btn-outline-white { border: 2px solid rgba(255, 255, 255, 0.3); color: white; border-radius: 30px; padding: 12px 30px; text-decoration: none; margin-left: 10px; display: inline-block; }

        /* --- Dynamic Message Styling --- */
        .msg-container { position: relative; z-index: 10; margin-top: -20px; margin-bottom: 20px; }
        .user-msg { padding: 12px 20px; border-radius: 8px; font-weight: 600; display: inline-block; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .msg-login { background: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; }
        .msg-logout { background: #f8d7da; color: #842029; border: 1px solid #f5c2c7; }

        /* --- Section 2: Products --- */
        .product-section { padding: 80px 0; background: #eff2f1; }
        .product-item { text-align: center; text-decoration: none; display: block; color: #2f2f2f; }
        .product-item img { background: #dce5e4; border-radius: 20px; padding: 30px; width: 100%; max-width: 250px; transition: .3s; }
        .product-item:hover img { transform: translateY(-15px); background: #cbd5d4; }

        /* --- Section 3: Why Choose Us --- */
        .why-choose-us { padding: 100px 0; background: #ffffff; }
        .feature { margin-bottom: 30px; }
        .feature img { width: 40px; margin-bottom: 15px; }
        .feature h3 { font-size: 15px; font-weight: 600; }
        .img-wrap-dots { position: relative; display: inline-block; }
        .img-wrap-dots::before { 
            content: ""; position: absolute; width: 255px; height: 217px; 
            background-image: url('images/dots-yellow.svg'); background-repeat: no-repeat; 
            z-index: 1; left: -50px; top: -50px; 
        }
        .img-wrap-dots img { position: relative; z-index: 2; border-radius: 20px; }

        .testimonial-section { padding: 100px 0; text-align: center; background: #ffffff; }
    </style>
</head>
<body>

<div class="container msg-container text-center">
    <?php 
    // If user is logged in
    if (isset($_SESSION['user_name'])) {
        echo "<div class='user-msg msg-login mt-3'>";
        echo "<i class='material-icons' style='vertical-align: middle; margin-right: 8px;'>face</i> Hi " . htmlspecialchars($_SESSION['user_name']) . "!";
        echo "</div>";
    } 
    // If user just logged out
    elseif (isset($_GET['status']) && $_GET['status'] == 'out') {
        $name = htmlspecialchars($_GET['name']);
        echo "<div class='user-msg msg-logout mt-3'>";
        echo "<i class='material-icons' style='vertical-align: middle; margin-right: 8px;'>logout</i> " . $name . " Logged Out"; 
        echo "</div>";
    } 
    ?>
</div>

<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <h1>Modern Interior <br> Design Studio</h1>
                <p class="text-white-50 mb-4">Discover premium furniture and modern designs at Furni. Give your home a fresh, sophisticated new look.</p>
                <p><a href="shop.php" class="btn btn-warning">Shop Now</a><a href="about.php" class="btn btn-outline-white">Explore</a></p>
            </div>
            <div class="col-lg-7 text-end"><img src="images/couch.png" class="img-fluid"></div>
        </div>
    </div>
</div>

<div class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h2 class="mb-4" style="font-weight:700;">Crafted with excellent material.</h2>
                <p>Our furniture is built to last and designed to enhance the beauty of your living space.</p>
                <a href="shop.php" class="btn btn-dark rounded-pill px-4">Explore</a>
            </div>
            <?php
            // Fetch products from database
            $sql = "SELECT * FROM products LIMIT 3";
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($res)) { ?>
                <div class="col-12 col-md-4 col-lg-3">
                    <a class="product-item" href="cart.php">
                        <img src="images/<?php echo $row['image']; ?>" class="img-fluid">
                        <h3 class="h6 mt-3 font-weight-bold"><?php echo $row['name']; ?></h3>
                        <strong>₹<?php echo $row['price']; ?></strong>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="why-choose-us">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4" style="font-weight:700;">Why Choose Us</h2>
                <div class="row">
                    <div class="col-6 mb-4 feature"><img src="images/truck.svg"><h3>Fast Shipping</h3><p>Reliable and timely delivery guaranteed.</p></div>
                    <div class="col-6 mb-4 feature"><img src="images/bag.svg"><h3>Easy to Shop</h3><p>Seamless and user-friendly ordering.</p></div>
                    <div class="col-6 mb-4 feature"><img src="images/support.svg"><h3>24/7 Support</h3><p>We are always here to help you.</p></div>
                    <div class="col-6 mb-4 feature"><img src="images/return.svg"><h3>Hassle Free</h3><p>Simple and easy return policy.</p></div>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <div class="img-wrap-dots"><img src="images/why-choose-us-img.jpg" class="img-fluid"></div>
            </div>
        </div>
    </div>
</div>

<div class="testimonial-section">
    <div class="container">
        <h2 class="mb-5">Testimonials</h2>
        <img src="images/person-1.png" width="80" class="rounded-circle mb-3">
        <p class="fst-italic text-muted">"The quality and design of furniture from Furni are absolutely amazing. It has completely transformed the look of my home."</p>
        <strong>— Priya Malik</strong>
    </div>
</div>

<footer class="py-5 bg-white text-center">
    <div class="container">
        <p class="text-muted small">&copy; 2026 Furni E-commerce. Created by Pragati Nirali.</p>
    </div>
</footer>

<?php include('footer.php'); ?>

</body>
</html>