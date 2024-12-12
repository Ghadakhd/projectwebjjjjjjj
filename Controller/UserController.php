<?php
// Include required files
include_once(__DIR__ . '/../configuser.php');
include_once(__DIR__ . '/../Model/usermodel.php');

class UserController
{
    private $db;

    public function __construct()
    {
        // Initialize the database connection
        $this->db = configuser::getConnexion();
    }

    /**
     * List all users
     * @return array
     */
    public function listUsers()
    {
        $sql = "SELECT * FROM user";
        try {
            $users = $this->db->query($sql);
            return $users->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error fetching users: ' . $e->getMessage());
        }
    }

    /**
     * Delete a user by ID
     * @param int $id
     */
    public function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE iduser = :iduser";
        try {
            $query = $this->db->prepare($sql);
            $query->bindValue(':iduser', $id, PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            die('Error deleting user: ' . $e->getMessage());
        }
    }

    /**
     * Add a new user
     * @param User $user
     */
    public function addUser($user)
    {
        $sql = "INSERT INTO user (username, email, password, first_name, last_name, date_of_birth)
                VALUES (:username, :email, :password, :first_name, :last_name, :date_of_birth)";
        try {
            $query = $this->db->prepare($sql);
            $query->execute([
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'date_of_birth' => $user->getDateOfBirth()
            ]);
        } catch (Exception $e) {
            die('Error adding user: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing user
     * @param User $user
     * @param int $id
     */
    public function updateUser($user, $id)
    {
        $sql = "UPDATE user SET 
                    username = :username,
                    email = :email,
                    password = :password,
                    first_name = :first_name,
                    last_name = :last_name,
                    date_of_birth = :date_of_birth
                WHERE iduser = :iduser";
        try {
            $query = $this->db->prepare($sql);
            $query->execute([
                'iduser' => $id,
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'date_of_birth' => $user->getDateOfBirth()
            ]);
        } catch (Exception $e) {
            die('Error updating user: ' . $e->getMessage());
        }
    }

    /**
     * Show a single user by ID
     * @param int $id
     * @return array
     */
    public function showUser($id)
    {
        $sql = "SELECT * FROM user WHERE iduser = :iduser";
        try {
            $query = $this->db->prepare($sql);
            $query->bindValue(':iduser', $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error fetching user: ' . $e->getMessage());
        }
    }




    public function getUserData($userId) {
        try {
            // Connect to the database
            $pdo = $db;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare the SQL query to retrieve the user data
            $stmt = $pdo->prepare("SELECT iduser, username, email, first_name, last_name, date_of_birth FROM user WHERE iduser = :iduser");
            $stmt->bindParam(':iduser', $userId, PDO::PARAM_INT);

            // Execute the query
            $stmt->execute();

            // Fetch the user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                return $user; // Return the user data as an associative array
            } else {
                return null; // No user found
            }
        } catch (PDOException $e) {
            // Handle any errors (e.g., connection issues)
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function getUserIdByUsername($username) {
        // Connect to the database without using constants
        try {
            // Replace with your actual database credentials
            $pdo = $db;

            // Prepare and execute the query
            $stmt = $pdo->prepare("SELECT iduser FROM user WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            // Fetch the result
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                return $user['id']; // Return the user ID
            } else {
                return null; // No user found
            }
        } catch (PDOException $e) {
            // Handle connection errors
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getUserDataByUsername($username) {
        // Connect to the database without using constants
        try {
            // Replace with your actual database credentials
            $pdo = new PDO('mysql:host=localhost;dbname=user', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Prepare and execute the query to select both the iduser and password
            $stmt = $pdo->prepare("SELECT iduser, username, password FROM user WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
    
            // Fetch the result
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                return $user; // Return the user with iduser and password
            } else {
                return null; // No user found
            }
        } catch (PDOException $e) {
            // Handle connection errors
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    
}



?>
