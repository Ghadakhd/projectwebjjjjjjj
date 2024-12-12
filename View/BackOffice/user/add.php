<?php
// Include required files

include_once '../../../Controller/UserController.php'; // User Controller

// Initialize the UserController
$userController = new UserController();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $firstName = htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $dateOfBirth = $_POST['date_of_birth'];

    // Validate inputs
    $errors = [];
    if (empty($username)) $errors[] = "Username is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if (empty($password) || strlen($password) < 6) $errors[] = "Password must be at least 6 characters long.";
    if (empty($dateOfBirth)) $errors[] = "Date of birth is required.";

    // Proceed if there are no errors
    if (empty($errors)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Create a User object
        $user = new User(
            null, // ID is auto-generated
            $username,
            $email,
            $hashedPassword,
            $firstName,
            $lastName,
            $dateOfBirth
        );

        // Use the controller to add the user to the database
        try {
            $userController->addUser($user);
            header("Location: index.php?success=1");
            exit;
        } catch (Exception $e) {
            $errors[] = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/main.css"> <!-- Shared CSS -->
    <title>Add User</title>
</head>
<body>
    <div class="container">
        <h1>Add New User</h1>

        <?php
        // Display errors if any
        if (!empty($errors)) {
            echo '<div class="error-messages">';
            foreach ($errors as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
            echo '</div>';
        }
        ?>

        <!-- Add User Form -->
        <form action="add.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter username" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" placeholder="Enter first name">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" placeholder="Enter last name">
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" required>
            </div>

            <button type="submit" class="btn">Add User</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
