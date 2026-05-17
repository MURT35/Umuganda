<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
require_once '../models/Request.php';
require_once '../../config/db.php';

$search       = trim($_GET['search'] ?? '');
$statusFilter = trim($_GET['status'] ?? '');
$requestModel = new Request($conn);
$result       = $requestModel->getAllRequests($search, $statusFilter);
$counts       = $requestModel->countByStatus();
$total        = array_sum($counts);
$adminUser    = htmlspecialchars($_SESSION['admin_user'] ?? 'Admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard — Umuganda Smart</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

<header>
  <a href="../../public/index.php" class="logo">
    <div class="logo-icon">🏡</div>
    <h1>Umuganda <span>Smart</span></h1>
  </a>
  <nav>
    <a href="../../public/index.php">Home</a>
    <a href="admin_dashboard.php" class="active">Dashboard</a>
    <a href="../controllers/AuthController.php?action=logout">Logout (<?php echo $adminUser; ?>)</a>
  </nav>
</header>

<div class="section" style="padding-top:36px;">

  <!-- Stats -->
  <div class="dashboard-stats">
    <div class="stat-card">
      <div class="stat-num"><?php echo $total; ?></div>
      <div class="stat-label">Total Requests</div>
    </div>
    <div class="stat-card stat-pending">
      <div class="stat-num"><?php echo $counts['Pending']; ?></div>
      <div class="stat-label">⏳ Pending</div>
    </div>
    <div class="stat-card stat-progress">
      <div class="stat-num"><?php echo $counts['In Progress']; ?></div>
      <div class="stat-label">🔧 In Progress</div>
    </div>
    <div class="stat-card stat-resolved">
      <div class="stat-num"><?php echo $counts['Resolved']; ?></div>
      <div class="stat-label">✅ Resolved</div>
    </div>
  </div>

  <!-- Table -->
  <div class="table-wrap">
    <div class="table-header">
      <h3>📋 All Service Requests</h3>
      <form method="GET" class="filter-form">
        <input type="text" name="search" placeholder="Search name or category…" value="<?php echo htmlspecialchars($search); ?>">
        <select name="status">
          <option value="">All Statuses</option>
          <option value="Pending"     <?php if ($statusFilter === 'Pending')     echo 'selected'; ?>>⏳ Pending</option>
          <option value="In Progress" <?php if ($statusFilter === 'In Progress') echo 'selected'; ?>>🔧 In Progress</option>
          <option value="Resolved"    <?php if ($statusFilter === 'Resolved')    echo 'selected'; ?>>✅ Resolved</option>
        </select>
        <button type="submit" class="btn btn-sm btn-green">Filter</button>
        <?php if ($search || $statusFilter): ?>
          <a href="admin_dashboard.php" class="btn btn-sm" style="background:#e2e8f0; color:#333;">Clear</a>
        <?php endif; ?>
      </form>
    </div>

    <div style="overflow-x:auto;">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Category</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $count = 0;
          while ($row = mysqli_fetch_assoc($result)):
            $count++;
            $status = $row['status'];
            $id     = $row['id'];
            $statusClass = match($status) {
              'Pending'     => 'status-pending',
              'In Progress' => 'status-progress',
              'Resolved'    => 'status-resolved',
              default       => ''
            };
            $priorityClass = match($row['priority_level']) {
              'High'   => 'priority-high',
              'Medium' => 'priority-medium',
              default  => 'priority-low'
            };
          ?>
          <tr>
            <td><?php echo $id; ?></td>
            <td><strong><?php echo htmlspecialchars($row['fullname']); ?></strong></td>
            <td style="font-size:0.82rem; color:var(--text-mid);"><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['category']); ?></td>
            <td><span class="priority-tag <?php echo $priorityClass; ?>"><?php echo $row['priority_level']; ?></span></td>
            <td><span class="status-badge <?php echo $statusClass; ?>"><?php echo $status; ?></span></td>
            <td style="font-size:0.82rem; color:var(--text-mid);"><?php echo date('d M Y', strtotime($row['created_at'])); ?></td>
            <td>
              <div class="action-btns">
                <?php if ($status !== 'In Progress' && $status !== 'Resolved'): ?>
                  <a class="btn btn-sm btn-green" href="../controllers/update_status.php?id=<?php echo $id; ?>&status=In+Progress">Accept</a>
                <?php endif; ?>
                <?php if ($status !== 'Resolved'): ?>
                  <a class="btn btn-sm" href="../controllers/update_status.php?id=<?php echo $id; ?>&status=Resolved">Resolve</a>
                <?php endif; ?>
                <?php if ($status === 'Resolved'): ?>
                  <span style="color:var(--text-light); font-size:0.82rem;">✅ Done</span>
                <?php endif; ?>
              </div>
            </td>
          </tr>
          <?php endwhile; ?>
          <?php if ($count === 0): ?>
          <tr>
            <td colspan="8" style="text-align:center; padding:40px; color:var(--text-light);">
              No requests found<?php echo ($search || $statusFilter) ? ' for this filter' : ''; ?>.
            </td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<footer>
  <p>&copy; 2026 <strong>Umuganda Smart</strong> — INES Ruhengeri | Group 8, Year II C</p>
</footer>

</body>
</html>
