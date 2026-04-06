<?php
session_start();
include('header.php');
?>

<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Success!</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="untree_co-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="display-3 text-success"><i class="fas fa-check-circle"></i></span>
                
                <h2 class="display-3 text-black">Thank you!</h2>
                <p class="lead mb-5">"Your order has been placed successfully. We will get in touch with you shortly."</p>
                
                <div class="payment-details mb-5 p-4 border bg-light d-inline-block" style="border-radius: 15px; min-width: 300px;">
                    <h4 class="h5 text-black">Order Summary</h4>
                    <hr>
                    <p class="mb-1"><strong>Status:</strong> <span class="badge bg-success">Paid</span></p>
                    <p class="mb-1"><strong>Payment Gateway:</strong> Razorpay</p>
                    <p class="mb-0"><strong>Delivery:</strong> 5-7 Working Days</p>
                </div>

                <p>
                    <a href="shop.php" class="btn btn-sm btn-outline-black">Back to Shop</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>