<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Make a Payment</h2>
        <form action="../backend/process-payment.php" method="POST">
            <label>Card Number:</label>
            <input type="text" name="card_number" required>
            
            <label>Expiry Date (YYYY-MM):</label>
            <input type="text" name="expiry_date" required>
            
            <label>CVV:</label>
            <input type="text" name="cvv" required>
            
            <label>Amount:</label>
            <input type="number" name="amount" required>

            <button type="submit">Pay Now</button>
        </form>
        <br>
        <a href="customer.php">Back to Dashboard</a>
    </div>
</body>
</html>
