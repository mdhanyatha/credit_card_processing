<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Process Payment</h2>
        <form action="../backend/process-payment.php" method="POST">
            <label>Card Number:</label>
            <input type="text" name="card_number" required maxlength="16" pattern="\d{16}" title="Enter a valid 16-digit card number">
            
            <label>Expiry Date:</label>
            <input type="month" name="expiry_date" required>
            
            <label>CVV:</label>
            <input type="text" name="cvv" required maxlength="3" pattern="\d{3}" title="Enter a valid 3-digit CVV">
            
            <label>Enter Amount:</label>
            <input type="number" name="amount" required min="1">
            
            <button type="submit">Pay Now</button>
        </form>
        <br>
        <a href="customer.php">Back to Dashboard</a>
    </div>
</body>
</html>
