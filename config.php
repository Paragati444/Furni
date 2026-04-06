<?php
// config.php
// तुझ्या Razorpay टेस्ट कीज
$api_key = "rzp_test_RwGSjmfuU1cQ0q"; 
$key_secret = "J8yWmnXAsAz7uh3c343aNDAE"; 

// डेटाबेस कनेक्शन (Furni Project - Port 3307)
$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "furni_db";
$port = 3307;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>