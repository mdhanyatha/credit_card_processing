<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "❌ Access Denied.";
    exit();
}

// Fetch all vendors
$query = "SELECT id, name, email, status FROM users WHERE role='vendor'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Vendors</title>
</head>
<body>
    <h2>Vendor List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <?php if ($row['status'] === 'pending'): ?>
                    <a href="approve-vendor.php?id=<?php echo $row['id']; ?>">Approve</a>
                <?php endif; ?>
                <a href="delete-vendor.php?id=<?php echo $row['id']; ?>">Remove</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="admin.php">Back to Dashboard</a>
</body>
</html>
