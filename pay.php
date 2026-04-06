<?php
session_start();
require('config.php'); // इथे तुझी API Key (rzp_test_...) लोड होईल

// १. मागील पेजवरून (Checkout) आलेला डेटा मिळवणे
// जर युजरने नाव भरले नसेल तर 'Guest User' असे दिसेल
$full_name = isset($_POST['c_fname']) ? $_POST['c_fname'] . " " . $_POST['c_lname'] : "Pragati (Dummy)";
$email = isset($_POST['c_email_address']) ? $_POST['c_email_address'] : "testuser@example.com";
$phone = isset($_POST['c_phone']) ? $_POST['c_phone'] : "9806745674";
$total_amt = isset($_POST['total_amt']) ? $_POST['total_amt'] : 350; 

$amount_in_paise = $total_amt * 100; // Razorpay ला पैसे 'Paise' मध्ये लागतात

include('header.php');
?>

<div class="container text-center py-5">
    <div class="spinner-border text-success" role="status"></div>
    <h2 class="mt-3">Processing Your Payment...</h2>
    <p>कृपया हे पेज रिफ्रेश करू नका. आम्ही तुम्हाला पेमेंट गेटवेवर घेऊन जात आहोत.</p>

    <form action="payment_process.php" method="POST">
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="<?php echo $api_key; ?>" 
            data-amount="<?php echo $amount_in_paise; ?>" 
            data-currency="INR"
            data-name="Furni E-shop"
            data-description="Furniture Order"
            data-image="images/favicon.png"
            
            /* --- इथे तुमचे नाव आणि ईमेल दिसेल --- */
            data-prefill.name="<?php echo $full_name; ?>" 
            data-prefill.email="<?php echo $email; ?>"
            data-prefill.contact="<?php echo $phone; ?>" 
            /* ----------------------------------- */

            data-theme.color="#3b5d50"
        ></script>
        
        <input type="hidden" name="name" value="<?php echo $full_name; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="amt" value="<?php echo $total_amt; ?>">
        <input type="hidden" name="phone" value="<?php echo $phone; ?>">
        
        <input type="hidden" name="address" value="<?php echo $_POST['c_address'] ?? ''; ?>">
        <input type="hidden" name="state" value="<?php echo $_POST['c_state_country'] ?? ''; ?>">
        <input type="hidden" name="zip" value="<?php echo $_POST['c_postal_zip'] ?? ''; ?>">
    </form>
</div>

<script>
    // पेज लोड होताच Razorpay चे निळे बटण आपोआप क्लिक होईल
    window.onload = function(){
        var rzpButton = document.querySelector('.razorpay-payment-button');
        if(rzpButton) {
            rzpButton.click();
        }
    };
</script>

<?php include('footer.php'); ?>