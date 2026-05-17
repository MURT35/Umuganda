<?php
// Controller: Auth
// Handles admin login and logout

session_start();
require_once '../../config/db.php';

$action = $_GET['action'] ?? 'login';

if ($action === 'logout') {
    session_destroy();
    header('Location: ../../public/index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $error = '';

    if (empty($username) || empty($password)) {
        $error = 'Please fill in all fields.';
    } else {
        // Check against admins table
        $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        // Support both plain-text fallback (admin123) and hashed passwords
        $valid = false;
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $valid = true;
            } elseif ($password === 'admin123' && $username === 'admin') {
                // Fallback for plain-text demo credentials
                $valid = true;
            }
        }

        if ($valid) {
            $_SESSION['admin'] = true;
            $_SESSION['admin_user'] = $username;
            header('Location: ../views/admin_dashboard.php');
            exit();
        } else {
            $error = 'Invalid username or password.';
        }
    }

    // Show login view with error
    require_once '../views/login.php';
} else {
    require_once '../views/login.php';
}
?>
