<?php
include_once '../../../Controller/UserController.php'; // User Controller
// Initialize the UserController
$userController = new UserController();

// Check if the 'id' parameter is passed in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = intval($_GET['id']);

    try {
        // Call the controller to delete the user
        $userController->deleteUser($userId);

        // Redirect to the user list with a success message
        header("Location: index.php?success=1");
        exit;
    } catch (Exception $e) {
        // Redirect to the user list with an error message
        header("Location: index.php?error=" . urlencode($e->getMessage()));
        exit;
    }
} else {
    // If the 'id' parameter is missing or invalid, redirect to the user list
    header("Location: index.php?error=Invalid user ID.");
    exit;
}
?>
