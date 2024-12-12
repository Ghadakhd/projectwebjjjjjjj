<?php
// Include required files
include_once '../../../Controller/UserController.php'; // User Controller

// Initialize the UserController
$userController = new UserController();

// Check if the 'id' parameter is passed in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = intval($_GET['id']);

    // Fetch user details by ID
    $user = $userController->getUserById($userId);

    if (!$user) {
        // Redirect if user is not found
        header("Location: index.php?error=User not found.");
        exit;
    }
} else {
    // Redirect if the 'id' parameter is missing or invalid
    header("Location: index.php?error=Invalid user ID.");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $firstName = htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $dateOfBirth = $_POST['date_of_birth'];

    // Validate inputs
    $errors = [];
    if (empty($username)) $errors[] = "Username is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if (empty($dateOfBirth)) $errors[] = "Date of birth is required.";

    if (empty($errors)) {
        try {
            // Update user information
            $updatedUser = new User(
                $userId,
                $username,
                $email,
                $user['password'], // Keep existing password
                $firstName,
                $lastName,
                $dateOfBirth
            );

            $userController->updateUser($updatedUser);

            // Redirect with success message
            header("Location: index.php?success=1");
            exit;
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../../../View/FrontOffice/auth/style.css">
</head>
<body>
    <div class="form-box">
        <form action="edit.php?id=<?php echo $userId; ?>" method="POST">
            <h1>Edit User</h1>
            <?php if (!empty($errors)): ?>
                <div style="color: red;">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="input-box">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required><br>
            </div>

            <div class="input-box">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>
            </div>

            <div class="input-box">
                <label for="first_name">First Name:</label><br>
                <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>"><br>
            </div>

            <div class="input-box">
                <label for="last_name">Last Name:</label><br>
                <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>"><br>
            </div>

            <div class="input-box">
                <label for="date_of_birth">Date of Birth:</label><br>
                <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $user['date_of_birth']; ?>" required><br>
            </div>

            <button type="submit" class="btn">Update</button>
        </form>
    </div>
</body>
</html>
