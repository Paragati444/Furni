<?php
session_start();
require('config.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // डेटाबेसमधून प्रॉडक्ट डिलीट करण्यासाठी क्वेरी
    $delete_query = "DELETE FROM products WHERE id = $id";

    if($conn->query($delete_query)) {
        // डिलीट झाल्यावर पुन्हा लिस्ट पेजवर जाण्यासाठी
        header("Location: manage_products.php?msg=deleted");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: manage_products.php");
}
?>