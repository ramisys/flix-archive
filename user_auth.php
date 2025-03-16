<?php
session_start();

require 'db_connect.php'; // Ensure your database connection is included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM clients WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) { // Verify hashed password
            $_SESSION['client_id'] = $user['client_id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit;
        } else {
            header("Location: user_login.php?error=Incorrect password.");
            exit;
        }
    } else {
        header("Location: user_login.php?error=User not found.");
        exit;
    }
}

$conn->close();
?>
