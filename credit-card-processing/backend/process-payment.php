<?php
include 'config.php';
session_start();

// ✅ Only Customers Can Access This
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    echo "❌ Access Denied. Only customers can make payments.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_SESSION['user_id'];
    $card_number = $_POST['card_number'];
    $expiry_input = $_POST['expiry_date']; // format: YYYY-MM
    $cvv = $_POST['cvv'];
    $amount = $_POST['amount'];

    // ✅ Format expiry date to match DB (assumes DB stores it as YYYY-MM-DD)
    $expiry_date = $expiry_input . "-01";

    // ✅ Debug - show submitted data (Remove in production)
    echo "<pre>";
    echo "Submitted Data:\n";
    echo "User ID: $user_id\n";
    echo "Card Number: $card_number\n";
    echo "Expiry Date: $expiry_date\n";
    echo "CVV: $cvv\n";
    echo "Amount: $amount\n";
    echo "</pre>";

    // ✅ Check card validity using prepared statements
    $stmt = $conn->prepare("SELECT * FROM cards WHERE user_id = ? AND card_number = ? AND expiry_date = ? AND cvv = ?");
    $stmt->bind_param("isss", $user_id, $card_number, $expiry_date, $cvv);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $card = $result->fetch_assoc();

        if ($card['balance'] >= $amount) {
            // ✅ Deduct amount
            $new_balance = $card['balance'] - $amount;

            // Update the balance using a prepared statement
            $update_balance = $conn->prepare("UPDATE cards SET balance = ? WHERE id = ?");
            $update_balance->bind_param("di", $new_balance, $card['id']);
            $update_balance->execute();

            // ✅ Record transaction
            $insert_transaction = $conn->prepare("INSERT INTO transactions (user_id, card_id, amount, status) VALUES (?, ?, ?, ?)");
            $status = 'pending';
            $insert_transaction->bind_param("iiis", $user_id, $card['id'], $amount, $status);
            $insert_transaction->execute();

            echo "✅ Payment successful! Waiting for vendor approval.";
        } else {
            echo "❌ Insufficient funds.";
        }
    } else {
        echo "❌ Invalid Card Details.";
    }

    // Close prepared statements
    $stmt->close();
}
?>
