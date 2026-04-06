<?php 
session_start();
include('header.php'); 

// १. कार्टमधील एकूण रक्कम मोजणे (जर सेशनमध्ये नसेल तर)
$total_amount = 0;
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $item) {
        $total_amount += ($item['price'] * $item['quantity']);
    }
} else {
    $total_amount = 350.00; // Default जर कार्ट रिकामी असेल तर
}
?>

<div class="hero" style="background: #3b5d50; padding: 60px 0; color: white;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h1>Checkout</h1>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <form action="pay.php" method="POST">
            
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border bg-white shadow-sm" style="border-radius: 15px;">
                        
                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label class="text-black">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="c_fname" required>
                            </div>
                            <div class="col-md-6">
                                <label class="text-black">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="c_lname" required>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-black">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="c_address" placeholder="Street address" required>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label class="text-black">State / Country <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="c_state_country" required>
                            </div>
                            <div class="col-md-6">
                                <label class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="c_postal_zip" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label class="text-black">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="c_email_address" required>
                            </div>
                            <div class="col-md-6">
                                <label class="text-black">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="c_phone" placeholder="Phone Number" required>
                            </div>
                        </div>

                        <input type="hidden" name="total_amt" value="<?php echo $total_amount; ?>">

                    </div>
                </div>

                <div class="col-md-6">
                    <h2 class="h3 mb-3 text-black">Your Order</h2>
                    <div class="p-3 p-lg-5 border bg-white shadow-sm" style="border-radius: 15px;">
                        <table class="table site-block-order-table mb-5">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // २. कार्टमधील प्रत्येक वस्तू इथे दाखवणे
                                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                    foreach($_SESSION['cart'] as $item) {
                                        ?>
                                        <tr>
                                            <td><?php echo $item['name']; ?> <strong class="mx-2">x</strong> <?php echo $item['quantity']; ?></td>
                                            <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                    <td class="text-black font-weight-bold"><strong>$<?php echo number_format($total_amount, 2); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="border p-3 mb-3">
                            <h3 class="h6 mb-0 text-success">Online Payment (Razorpay)</h3>
                            <p class="mb-0 text-muted small">Pay via UPI, Cards or Netbanking.</p>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-black btn-lg py-3 btn-block w-100 fw-bold" style="background: #2f2f2f; color: white;">
                                Place Order
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>