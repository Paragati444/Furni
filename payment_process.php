<?php
session_start();
include('db_connect.php'); 

if (isset($_POST['razorpay_payment_id'])) {
    
    // 1. Sanitize incoming data
    $customer_name = mysqli_real_escape_string($conn, $_POST['name']);
    $email         = mysqli_real_escape_string($conn, $_POST['email']);
    $phone         = mysqli_real_escape_string($conn, $_POST['phone']);
    $total         = mysqli_real_escape_string($conn, $_POST['amt']);
    $address       = mysqli_real_escape_string($conn, $_POST['address']);
    $state         = mysqli_real_escape_string($conn, $_POST['state']);
    $zip           = mysqli_real_escape_string($conn, $_POST['zip']);
    $payment_id    = $_POST['razorpay_payment_id'];

    // 2. Insert into 'orders' table
    $sql_order = "INSERT INTO orders (full_name, email, phone, address, state, zip_code, total_amt, order_status, payment_id, created_at) 
                  VALUES ('$customer_name', '$email', '$phone', '$address', '$state', '$zip', '$total', 'Placed', '$payment_id', NOW())";

    if (mysqli_query($conn, $sql_order)) {
        
        // 3. Get the new Order ID (हा ID आपण बिलसाठी वापरणार आहोत)
        $last_order_id = mysqli_insert_id($conn);

        // 4. Insert each cart item into 'order_items'
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $p_name = mysqli_real_escape_string($conn, $item['name']);
                $p_price = $item['price'];
                $p_qty   = $item['quantity'];

                $sql_items = "INSERT INTO order_items (order_id, product_name, price, quantity) 
                              VALUES ('$last_order_id', '$p_name', '$p_price', '$p_qty')";
                
                mysqli_query($conn, $sql_items);
            }
        }

        // 5. Success Message with Invoice Link
        unset($_SESSION['cart']);
        
        echo "<div style='text-align:center; margin-top:100px; font-family: Arial, sans-serif;'>
                <h1 style='color: #3b5d50;'>✔ Order Placed Successfully!</h1>
                <p>Order ID: <strong>#$last_order_id</strong></p>
                <p>You can now check the 'order_items' table in phpMyAdmin; the data should be successfully populated there!</p>
                
                <br>
                <a href='invoice.php?id=$last_order_id' style='background: #3b5d50; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;'>Download Invoice</a>
                
                <br><br><br>
                <a href='index.php' style='color: #3b5d50; text-decoration: underline;'>Back to Home</a>
              </div>";

    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid Request!";
}
?>