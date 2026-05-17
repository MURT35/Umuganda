<?php
// Model: Request
// Handles all database operations for service requests

class Request {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new service request
    public function createRequest($fullname, $email, $category, $priority, $description) {
        $stmt = $this->conn->prepare(
            "INSERT INTO requests (fullname, email, category, priority_level, description)
             VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssss", $fullname, $email, $category, $priority, $description);
        return $stmt->execute();
    }

    // Get all requests with optional search and status filter
    public function getAllRequests($search = '', $status = '') {
        $sql = "SELECT * FROM requests WHERE 1=1";
        if (!empty($search)) {
            $safe = $this->conn->real_escape_string($search);
            $sql .= " AND (category LIKE '%$safe%' OR fullname LIKE '%$safe%' OR description LIKE '%$safe%')";
        }
        if (!empty($status)) {
            $safe = $this->conn->real_escape_string($status);
            $sql .= " AND status = '$safe'";
        }
        $sql .= " ORDER BY FIELD(priority_level,'High','Medium','Low'), created_at DESC";
        return $this->conn->query($sql);
    }

    // Count requests by status (for dashboard summary)
    public function countByStatus() {
        $result = $this->conn->query(
            "SELECT status, COUNT(*) as total FROM requests GROUP BY status"
        );
        $counts = ['Pending' => 0, 'In Progress' => 0, 'Resolved' => 0];
        while ($row = mysqli_fetch_assoc($result)) {
            $counts[$row['status']] = $row['total'];
        }
        return $counts;
    }

    // Update status of a request
    public function updateStatus($id, $status) {
        $stmt = $this->conn->prepare(
            "UPDATE requests SET status = ? WHERE id = ?"
        );
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }

    // Get single request by ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM requests WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
