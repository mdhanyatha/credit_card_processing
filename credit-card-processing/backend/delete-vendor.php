<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "❌ Access Denied.";
    exit();
}

if (isset($_GET['id'])) {
    $vendor_id = $_GET['id'];
    $delete_query = "DELETE FROM users WHERE id='$vendor_id'";

    if ($conn->query($delete_query)) {
        echo "✅ Vendor deleted successfully.";
    } else {
        echo "❌ Error deleting vendor: " . $conn->error;
    }
}

header("Location: manage-vendors.php");
exit();
?>
