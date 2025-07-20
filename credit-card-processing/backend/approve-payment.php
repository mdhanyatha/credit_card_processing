<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "❌ Access Denied. Please <a href='../frontend/index.html'>Login</a>";
    exit();
}

$transaction_id = $_POST['transaction_id'];

// Update transaction status
$sql = "UPDATE transactions SET status='successful' WHERE id=$transaction_id";

if ($conn->query($sql) === TRUE) {
    echo "✅ Payment approved! <a href='../frontend/vendor.php'>Back</a>";
} else {
    echo "❌ Error: " . $conn->error;
}
?>