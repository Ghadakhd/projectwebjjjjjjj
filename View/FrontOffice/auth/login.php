<?php
// Include required files
include_once '../../../Controller/UserController.php';
include_once '../../../configuser.php';

// Initialize the UserController
$userController = new UserController();




// Start the session
session_start();



// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['password']);

    // Validate inputs
    $errors = [];
    if (empty($username)) $errors[] = "Username is required.";
    if (empty($password)) $errors[] = "Password is required.";

    // Proceed if there are no errors
    if (empty($errors)) {
        // Fetch the user by username
        try {
            $user = $userController->getUserDataByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                if (!is_writable(session_save_path())) {

                    header("Location: ../register.php");
                    exit;
                }


                // Password is correct, set session data
                
                $_SESSION['user_id'] = $user['iduser']; // Set the user ID in session
                setcookie('user_id', $user["iduser"]);
                setcookie('username', $user["username"]);
                $_SESSION['username'] = $user['username']; // Optionally, store the username in session


                // Redirect to the user's account page or dashboard
                header("Location: ../../../index1.php");
                exit;
            } else {
                $errors[] = "Invalid username or password.";
            }
        } catch (Exception $e) {
            $errors[] = "Error: " . $e->getMessage();
        }
    }

    // If there are errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>

<!-- HTML Login Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../auth/style.css">
    <script src="../../../assets/js/user.js" defer></script>
    <title>Login</title>
</head>
<body>
    <div class="form-box">
        <form action="login.php" method="POST">
            <h1>Login</h1>

 

            <div class="input-box">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" placeholder="Enter your username" required><br>
                <span id="usernameError" style="color:red; display:none;"></span>
            </div>

            <div class="input-box">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" placeholder="Enter your password" required><br>
                <span id="passwordError" style="color:red; display:none;"></span>
            </div>

            <button type="submit" class="btn">Login</button>
            <p style="font-size: 14px; margin-top: 15px;">
                Don't have an account? 
                <a href="register.php" style="color: #7494ec; text-decoration: none; font-weight: 600;">Sign Up</a>
            </p>
        </form>
    </div>
</body>
</html>
