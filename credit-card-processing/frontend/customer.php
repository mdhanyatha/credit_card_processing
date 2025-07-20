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
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Customer Dashboard</h2>
        <a href="process-payment.php"><button>Process Payment</button></a>
        <a href="manage-cards.php"><button>Manage Cards</button></a>
        <a href="raise-dispute.php"><button>Raise Dispute</button></a>
        <a href="../backend/logout.php"><button>Logout</button></a>
    </div>
</body>
</html>