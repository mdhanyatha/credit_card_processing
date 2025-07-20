<?php
include 'config.php';
session_start();

// ✅ Only Vendors Can Access This
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'vendor') {
    echo "❌ Access Denied. Only vendors can approve payments.";
    exit();
}

// Fetch pending transactions
$query = "SELECT transactions.id, transactions.amount, transactions.status, 
                 users.email AS customer_email
          FROM transactions
          JOIN users ON transactions.user_id = users.id
          WHERE transactions.status = 'pending'";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Payments</title>
    <link rel="stylesheet" href="../frontend/style.css">
</head>
<body>
    <div class="container">
        <h2>Pending Transactions</h2>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Transaction ID</th>
                    <th>Customer Email</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['customer_email']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td>
                            <form action="approve-payment.php" method="POST">
                                <input type="hidden" name="transaction_id" value="<?php echo $row['id']; ?>">
                                <button type="submit">Approve</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No pending payments.</p>
        <?php endif; ?>
        <br>
        <a href="../frontend/vendor.php">Back to Dashboard</a>
    </div>
</body>
</html>
