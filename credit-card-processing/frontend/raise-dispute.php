<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    header("Location: ../index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raise Dispute</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Raise Dispute</h2>
        <form action="../backend/raise-dispute.php" method="POST">
            <label>Transaction ID:</label>
            <input type="number" name="transaction_id" required>
            <label>Reason:</label>
            <textarea name="reason" required></textarea>
            <button type="submit">Submit Dispute</button>
        </form>
        <br>
        <a href="customer.php">Back to Dashboard</a>
    </div>
</body>
</html>