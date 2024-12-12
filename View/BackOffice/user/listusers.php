<?php
// Include required files
include_once '../../../Controller/UserController.php'; // User Controller

// Initialize the UserController
$userController = new UserController();

// Fetch all users
$users = $userController->getAllUsers();

// Handle success and error messages
$successMessage = isset($_GET['success']) ? "Action completed successfully." : null;
$errorMessage = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="../../../View/FrontOffice/auth/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .actions a {
            margin-right: 10px;
            text-decoration: none;
            color: #7494ec;
            font-weight: bold;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Management</h1>

        <!-- Display success or error messages -->
        <?php if ($successMessage): ?>
            <p style="color: green;"><?php echo $successMessage; ?></p>
        <?php endif; ?>
        <?php if ($errorMessage): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <!-- Add User Button -->
        <p>
            <a href="add.php" style="color: #7494ec; font-weight: bold;">+ Add New User</a>
        </p>

        <!-- User Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['iduser']); ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['date_of_birth']); ?></td>
                            <td class="actions">
                                <a href="edit.php?id=<?php echo $user['iduser']; ?>">Edit</a>
                                <a href="delete.php?id=<?php echo $user['iduser']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
