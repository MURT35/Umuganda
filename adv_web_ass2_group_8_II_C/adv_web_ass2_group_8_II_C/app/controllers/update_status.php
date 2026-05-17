<?php
// Controller: Update Status
// Handles status transitions for service requests (Admin only)

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../views/login.php");
    exit();
}

require_once '../models/Request.php';
require_once '../../config/db.php';

$id     = intval($_GET['id'] ?? 0);
$status = trim($_GET['status'] ?? '');
$allowed = ['Pending', 'In Progress', 'Resolved'];

if ($id > 0 && in_array($status, $allowed)) {
    $requestModel = new Request($conn);
    $requestModel->updateStatus($id, $status);
}

header("Location: ../views/admin_dashboard.php");
exit();
?>
