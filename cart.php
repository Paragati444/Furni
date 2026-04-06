<?php 
/* Cart.php - Furni E-commerce Project 
   Author: Pragati
*/
include('db_connect.php'); 
include('header.php'); // नेव्हिगेशन आणि CSS इथे लोड होईल
?>

<div class="hero" style="background: #3b5d50; padding: 6rem 0; color: #ffffff;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <div class="intro-excerpt">
                    <h1 class="fw-bold display-1 mb-4">Cart</h1>
                    <p class="mx-auto" style="opacity: 0.8; font-size: 18px; max-width: 600px;">
                        Review your selected items and proceed to checkout to complete your purchase.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="untree_co-section before-footer-section" style="padding: 80px 0;">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <table class="table border-0">
                        <thead style="background: #f8f9fa;">
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="images/Product10.jfif" alt="Image" class="img-fluid" style="width: 100px; border-radius: 10px;">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">Nordic Accent Chair</h2>
                                </td>
                                <td>$95.00</td>
                                <td>
                                    <div class="input-group mb-3 d-flex align-items-center quantity-container mx-auto" style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                                        </div>
                                        <input type="text" class="form-control text-center quantity-amount" value="1" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-black increase" type="button">&plus;</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="fw-bold">$95.00</td>
                                <td><a href="#" class="btn btn-black btn-sm" style="border-radius: 8px;"><i class="fas fa-times"></i></a></td>
                            </tr>
        
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="images/Product16.jfif" alt="Image" class="img-fluid" style="width: 100px; border-radius: 10px;">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">Luxury Velvet Sofa</h2>
                                </td>
                                <td>$499.00</td>
                                <td>
                                    <div class="input-group mb-3 d-flex align-items-center quantity-container mx-auto" style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                                        </div>
                                        <input type="text" class="form-control text-center quantity-amount" value="1" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-black increase" type="button">&plus;</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="fw-bold">$499.00</td>
                                <td><a href="#" class="btn btn-black btn-sm" style="border-radius: 8px;"><i class="fas fa-times"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button class="btn btn-black btn-sm w-100 py-3">Update Cart</button>
                    </div>
                    <div class="col-md-6">
                        <a href="shop.php" class="btn btn-outline-black btn-sm w-100 py-3 text-decoration-none">Continue Shopping</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Coupon</label>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code" style="border-radius: 10px;">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-black py-3 w-100">Apply</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <div class="p-4 border rounded" style="background: #f8f9fa;">
                            <div class="row">
                                <div class="col-md-12 text-left border-bottom mb-4">
                                    <h3 class="text-black h4 text-uppercase fw-bold">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">$594.00</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black" style="font-size: 24px; color: #3b5d50;">$594.00</strong>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-black btn-lg py-3 w-100" onclick="window.location='checkout.php'">Proceed To Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include('footer.php'); // फुटर आणि JavaScript इथे लोड होईल
?>