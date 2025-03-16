<?php
session_start();
require '../db_connect.php'; // Ensure your database connection is included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) { // Verify hashed password
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['username'] = $admin['username'];
            header("Location: admin_dashboard.php");
            exit;
        } else {
            header("Location: admin_login.php?error=Incorrect password.");
            exit;
        }
    } else {
        header("Location: admin_login.php?error=User not found.");
        exit;
    }
}

$conn->close();
?>
