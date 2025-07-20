<?php
include '../backend/config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "❌ Access Denied. Please <a href='../frontend/index.html'>Login</a>";
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

// Query transactions
if ($role == 'admin') {
    $query = "SELECT * FROM transactions";
} else {
    $query = "SELECT * FROM transactions WHERE user_id = $user_id";
}

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Transactions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Your Transactions</h2>
        <table border="1">
            <tr>
                <th>Transaction ID</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['transaction_type']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['transaction_date']; ?></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <a href="customer.html">Back to Dashboard</a>
    </div>
</body>
</html>