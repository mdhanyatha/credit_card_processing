<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch user data

        echo "<pre>";
        print_r($row); // DEBUG: Print fetched user data
        echo "</pre>";

        // Plain text password comparison
        if (trim($password) == trim($row['password'])) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            if ($row['role'] == 'customer') {
                header("Location: ../frontend/customer.php");
            } elseif ($row['role'] == 'vendor') {
                header("Location: ../frontend/vendor.php");
            } elseif ($row['role'] == 'admin') {
                header("Location: ../frontend/admin.php");
            }
            exit();
        } else {
            echo "❌ Invalid password.";
        }
    } else {
        echo "❌ No user found with this email.";
    }
}
?>