<?php
session_start();
include('db_connect.php');

// १. URL मधून ऑर्डर आयडी मिळवण्याचा प्रयत्न करा
$order_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// जर URL मध्ये ID नसेल (० असेल), तर डेटाबेसमधून सर्वात शेवटची यशस्वी ऑर्डर शोधा
if ($order_id <= 0) {
    $latest_query = mysqli_query($conn, "SELECT id FROM orders ORDER BY id DESC LIMIT 1");
    if (mysqli_num_rows($latest_query) > 0) {
        $latest_row = mysqli_fetch_assoc($latest_query);
        $order_id = (int)$latest_row['id'];
    }
}

// जर डेटाबेसमध्ये एकही ऑर्डर नसेल, तरच एरर दाखवा
if ($order_id <= 0) {
    die("<h2 style='color:red; text-align:center; margin-top:50px;'>Error: No orders found in the database!</h2>");
}

// २. 'orders' टेबलमधून मुख्य माहिती काढणे
$order_query = mysqli_query($conn, "SELECT * FROM orders WHERE id = '$order_id'");
$order_data = mysqli_fetch_assoc($order_query);

if (!$order_data) {
    die("<h2 style='color:red; text-align:center; margin-top:50px;'>Error: Order #$order_id not found!</h2>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Order #<?php echo $order_id; ?></title>
    <style>
        .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, .15); font-size: 16px; line-height: 24px; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #555; }
        .invoice-box table { width: 100%; line-height: inherit; text-align: left; border-collapse: collapse; }
        .invoice-box table td { padding: 5px; vertical-align: top; }
        .invoice-box table tr.top table td.title { font-size: 40px; line-height: 45px; color: #3b5d50; font-weight: bold; }
        .invoice-box table tr.information table td { padding-bottom: 40px; }
        .invoice-box table tr.heading td { background: #eee; border-bottom: 1px solid #ddd; font-weight: bold; padding: 10px; }
        .invoice-box table tr.item td { border-bottom: 1px solid #eee; padding: 10px; }
        .invoice-box table tr.total td:nth-child(4) { border-top: 2px solid #3b5d50; font-weight: bold; padding: 10px; color: #333; }
        .print-btn { background: #3b5d50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; font-weight: bold; }
        @media print { .no-print { display: none; } .invoice-box { box-shadow: none; border: none; } }
    </style>
</head>
<body>

<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td class="title">FURNI.</td>
                        <td style="text-align: right;">
                            Invoice #: <?php echo $order_id; ?><br>
                            Date: <?php echo date('d M Y', strtotime($order_data['created_at'])); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="4">
                <table>
                    <tr>
                        <td>
                            <strong>Billed To:</strong><br>
                            <?php echo htmlspecialchars($order_data['full_name']); ?><br>
                            <?php echo htmlspecialchars($order_data['address']); ?><br>
                            <?php echo htmlspecialchars($order_data['state']); ?> - <?php echo $order_data['zip_code']; ?>
                        </td>
                        <td style="text-align: right;">
                            <strong>Contact:</strong><br>
                            <?php echo htmlspecialchars($order_data['phone']); ?><br>
                            <?php echo htmlspecialchars($order_data['email']); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Product Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
        </tr>

        <?php
        // ३. 'order_items' मधून वस्तूंची यादी काढणे
        $items_query = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id = '$order_id'");
        if(mysqli_num_rows($items_query) > 0) {
            while ($item = mysqli_fetch_assoc($items_query)) {
                $p_price = (float)$item['price'];
                $p_qty = (int)$item['quantity'];
                $subtotal = $p_price * $p_qty;
                ?>
                <tr class="item">
                    <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                    <td>₹<?php echo number_format($p_price, 2); ?></td>
                    <td><?php echo $p_qty; ?></td>
                    <td>₹<?php echo number_format($subtotal, 2); ?></td>
                </tr>
                <?php 
            }
        } else {
            echo "<tr><td colspan='4' style='text-align:center; padding:20px;'>No items found for this order.</td></tr>";
        }
        ?>

        <tr class="total">
            <td></td><td></td><td></td>
            <td>Total: ₹<?php echo number_format((float)$order_data['total_amt'], 2); ?></td>
        </tr>
    </table>

    <br><br>
    <div class="no-print" style="text-align: center;">
        <button class="print-btn" onclick="window.print()">Print Invoice</button>
        <a href="index.php" style="margin-left:15px; color: #3b5d50; text-decoration: none; font-weight: bold;">← Back to Home</a>
    </div>
</div>

</body>
</html>