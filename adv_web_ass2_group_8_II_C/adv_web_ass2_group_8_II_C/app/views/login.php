<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login — Umuganda Smart</title>
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
    <a href="submit_request.php">Submit Request</a>
    <a href="login.php" class="active">Admin Login</a>
  </nav>
</header>

<div class="login-wrap">
  <div class="login-card">
    <div class="login-icon">🔐</div>
    <h2>Admin Login</h2>
    <p>Enter your credentials to access the dashboard</p>

    <?php if (!empty($error)): ?>
      <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST" action="../controllers/AuthController.php">
      <div class="form-row" style="text-align:left;">
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter username" required autocomplete="username">
      </div>
      <div class="form-row" style="text-align:left;">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password" required autocomplete="current-password">
      </div>
      <button type="submit" class="btn" style="width:100%; margin-top:8px;">Login →</button>
    </form>

    <p style="margin-top:20px; font-size:0.82rem; color:var(--text-light);">
      Default: admin / admin123
    </p>
  </div>
</div>

<footer>
  <p>&copy; 2026 <strong>Umuganda Smart</strong> — INES Ruhengeri | Group 8, Year II C</p>
</footer>

</body>
</html>
