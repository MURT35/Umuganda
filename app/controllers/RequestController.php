<?php
// Controller: Request
// Handles service request submission

require_once '../models/Request.php';
require_once '../../config/db.php';

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname    = trim($_POST['fullname'] ?? '');
    $email       = trim($_POST['email'] ?? '');
    $category    = trim($_POST['category'] ?? '');
    $priority    = trim($_POST['priority_level'] ?? 'Low');
    $description = trim($_POST['description'] ?? '');

    // Validate
    if (empty($fullname) || empty($email) || empty($category) || empty($description)) {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $requestModel = new Request($conn);
        if ($requestModel->createRequest($fullname, $email, $category, $priority, $description)) {
            $success = true;
        } else {
            $error = 'Error submitting request. Please try again.';
        }
    }
}

// Show result view
require_once '../views/submit_result.php';
?>
