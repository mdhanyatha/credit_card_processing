<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    echo "❌ Access Denied. Please <a href='../frontend/index.html'>Login</a>";
    exit();
}

// Fetch all users
$query = "SELECT * FROM users";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>User Management</h2>
        <table border="1">
            <tr>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td>
                    <?php if ($row['role'] != 'admin') { ?>
                        <!-- Delete User -->
                        <form action="delete-user.php" method="POST" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <button type="submit">Delete</button>
                        </form>

                        <!-- Change User Role -->
                        <form action="update-role.php" method="POST" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <select name="new_role">
                                <option value="customer" <?php if ($row['role'] == 'customer') echo "selected"; ?>>Customer</option>
                                <option value="vendor" <?php if ($row['role'] == 'vendor') echo "selected"; ?>>Vendor</option>
                            </select>
                            <button type="submit">Update Role</button>
                        </form>
                    <?php } else { ?>
                        <span>Admin (Cannot change role)</span>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <a href="admin.php">Back to Dashboard</a>
    </div>
</body>
</html>
