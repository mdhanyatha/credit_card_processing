<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "❌ Access Denied.";
    exit();
}

if (isset($_GET['id'])) {
    $vendor_id = $_GET['id'];
    $update_query = "UPDATE users SET status='approved' WHERE id='$vendor_id'";

    if ($conn->query($update_query)) {
        echo "✅ Vendor approved successfully.";
    } else {
        echo "❌ Error approving vendor: " . $conn->error;
    }
}

header("Location: manage-vendors.php");
exit();
?>
