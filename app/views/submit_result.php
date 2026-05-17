<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request Result — Umuganda Smart</title>
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
    <a href="login.php">Admin Login</a>
  </nav>
</header>

<div class="section" style="padding-top:60px; text-align:center;">
  <?php if ($success): ?>
    <div style="max-width:520px; margin:0 auto;">
      <div style="font-size:72px; margin-bottom:16px;">✅</div>
      <h2 style="font-size:2rem; font-weight:800; color:var(--green-dark); margin-bottom:12px;">
        Request Submitted!
      </h2>
      <p style="color:var(--text-mid); font-size:1rem; line-height:1.7; margin-bottom:32px;">
        Your service request has been recorded. A service officer will review it
        and update its status. Thank you for helping improve your community.
      </p>
      <a class="btn" href="../../public/index.php">🏠 Back to Home</a>
      &nbsp;
      <a class="btn btn-green" href="submit_request.php" style="background:var(--green); color:white;">➕ Submit Another</a>
    </div>
  <?php else: ?>
    <div style="max-width:520px; margin:0 auto;">
      <div style="font-size:72px; margin-bottom:16px;">⚠️</div>
      <h2 style="font-size:2rem; font-weight:800; color:#c53030; margin-bottom:12px;">
        Submission Failed
      </h2>
      <?php if ($error): ?>
        <div class="alert alert-error" style="text-align:left;"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>
      <p style="color:var(--text-mid); margin-bottom:32px;">Please go back and try again.</p>
      <a class="btn" href="submit_request.php">← Try Again</a>
    </div>
  <?php endif; ?>
</div>

<footer>
  <p>&copy; 2026 <strong>Umuganda Smart</strong> — INES Ruhengeri | Group 8, Year II C</p>
</footer>

</body>
</html>
