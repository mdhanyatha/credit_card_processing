<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Print all submitted form data
    echo "<pre>";
    print_r($_POST);
    echo "Captured Role: " . ($_POST['role'] ?? 'Not Set'); 
    echo "</pre>";

    // If role is still missing, stop here for debugging
    if (!isset($_POST['role']) || empty($_POST['role'])) {
        echo "❌ Error: Role is not set. Please check register.html.";
        exit();
    }

    // Capture form inputs
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $income = $_POST['income'];
    $aadhar = $_POST['aadhar'];
    $pan = $_POST['pan'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    // Ensure 'role' is captured correctly
    $role = $_POST['role'];

    // ✅ Check if email already exists
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email);

    if ($result->num_rows > 0) {
        echo "❌ Error: Email already exists. Please use a different email.";
    } else {
        // ✅ Insert new user
        $sql = "INSERT INTO users (email, phone, address, state, pincode, income, aadhar, pan, password, role) 
                VALUES ('$email', '$phone', '$address', '$state', '$pincode', '$income', '$aadhar', '$pan', '$password', '$role')";
        
        if ($conn->query($sql) === TRUE) {
            // ✅ Redirect to registration success page
            header("Location: ../frontend/registration_success.html");
            exit();
        } else {
            echo "❌ Error: " . $conn->error;
        }
    }
}
?>