<?php
include 'config.php';  // Include your DB connection file
session_start();

// ✅ Only Customers Can Access This
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    echo "❌ Access Denied. Only customers can add cards.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted data
    $user_id = $_SESSION['user_id'];
    $card_number = trim($_POST['card_number']);
    $expiry_input = trim($_POST['expiry_date']);
    $cvv = trim($_POST['cvv']);
    $balance = $_POST['balance'];

    // ✅ Format expiry date to match DB (assumes DB stores it as YYYY-MM-DD)
    $expiry_date = $expiry_input . "-01";  // Store as YYYY-MM-01

    // Sanitize inputs to prevent SQL injection
    $card_number = mysqli_real_escape_string($conn, $card_number);
    $expiry_date = mysqli_real_escape_string($conn, $expiry_date);
    $cvv = mysqli_real_escape_string($conn, $cvv);
    $balance = mysqli_real_escape_string($conn, $balance);

    // ✅ Insert new card details into the database
    $stmt = $conn->prepare("INSERT INTO cards (user_id, card_number, expiry_date, cvv, balance) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $user_id, $card_number, $expiry_date, $cvv, $balance);

    if ($stmt->execute()) {
        echo "✅ Card added successfully!";
    } else {
        echo "❌ Error adding card. Please try again.";
    }

    // Close prepared statement
    $stmt->close();
}
?>
