<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Card</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Add New Card</h2>
        <form action="backend/add-card.php" method="POST">
            <label>Card Number:</label>
            <input type="text" name="card_number" required maxlength="16">
            
            <label>Expiry Date:</label>
            <input type="month" name="expiry_date" required>
            
            <label>CVV:</label>
            <input type="text" name="cvv" required maxlength="3">
            
            <label>Balance:</label>
            <input type="number" name="balance" required>
            
            <button type="submit">Add Card</button>
        </form>
        <br>
        <a href="customer.php">Back to Dashboard</a>
    </div>
</body>
</html>
