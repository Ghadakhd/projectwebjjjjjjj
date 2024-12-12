<?php
// Start the session
session_start();

// Include database connection or the UserController
include_once '../../../configuser.php'; // Database configuration
include_once '../../../Controller/UserController.php'; // UserController for data fetching

// Initialize UserController
$userController = new UserController();

// Check if the user is logged in (checking for a valid session)
if (isset($_SESSION['user_id'])) {
    // Get user data based on session user_id
    $user = $userController->getUserData($_SESSION['user_id']);
    
    if (!$user) {
        // If user data is not found, redirect to an error page or login page
        echo "User not found.";
        exit;
    }
} else {
    // If the user is not logged in, redirect to login page
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
</head>
<body>
    <h1>Welcome to Your Account, <?php echo htmlspecialchars($user['username']); ?></h1>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <p>Name: <?php echo htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']); ?></p>
    <p>Date of Birth: <?php echo htmlspecialchars($user['date_of_birth']); ?></p>

    <!-- Additional account management features here -->
    <a href="edit_account.php">Edit Your Account</a> <!-- Link to account edit page -->
    <a href="logout.php">Logout</a> <!-- Link to logout -->
</body>
</html>
