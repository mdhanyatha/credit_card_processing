<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    echo "❌ Access Denied. Only admins can access this page.";
    exit();
}

// ✅ Debugging: Print session data (Remove after testing)
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <button onclick="window.location.href='../backend/manage-users.php'">Manage Users</button>
        <button onclick="window.location.href='../backend/manage-vendors.php'">Manage Vendors</button>
        <button onclick="window.location.href='../backend/view-transactions.php'">View Transactions</button>
        <button onclick="window.location.href='../backend/logout.php'">Logout</button>
    </div>
</body>
</html>
