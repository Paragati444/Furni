<?php
$conn = mysqli_connect("localhost", "root", "", "furni_db",3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>