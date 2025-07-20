<?php
include '../backend/config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'vendor') {
    echo "❌ Access Denied.";
    exit();
}

// Fetch completed transactions
$query = "SELECT * FROM transactions WHERE status = 'successful'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sales</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Sales History</h2>
        <table border="1">
            <tr>
                <th>Transaction ID</th>
                <th>User ID</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['transaction_date']; ?></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <a href="vendor.php">Back to Dashboard</a>
    </div>
</body>
</html>