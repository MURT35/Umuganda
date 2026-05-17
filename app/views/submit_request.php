<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Request — Umuganda Smart</title>
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
    <a href="submit_request.php" class="active">Submit Request</a>
    <a href="login.php">Admin Login</a>
  </nav>
</header>

<div class="section" style="padding-top:40px; padding-bottom:60px;">
  <div class="form-wrap">
    <h2 class="form-title">📝 Submit a Service Request</h2>
    <p class="form-sub">Fill in all fields below. You will receive a confirmation once submitted.</p>

    <div id="form-alert"></div>

    <form method="POST" action="../controllers/RequestController.php" onsubmit="return validateForm()">

      <div class="form-2col">
        <div class="form-row">
          <label>Full Name <span>*</span></label>
          <input type="text" id="fullname" name="fullname" placeholder="e.g. Amina Uwimana" required>
        </div>
        <div class="form-row">
          <label>Email Address <span>*</span></label>
          <input type="email" id="email" name="email" placeholder="e.g. amina@example.com" required>
        </div>
      </div>

      <div class="form-2col">
        <div class="form-row">
          <label>Category <span>*</span></label>
          <select id="category" name="category" required>
            <option value="">-- Select Category --</option>
            <option value="Water Problem">🚰 Water Problem</option>
            <option value="Street Light Issue">💡 Street Light Issue</option>
            <option value="Cleaning Request">🧹 Cleaning Request</option>
            <option value="ICT Support">💻 ICT Support</option>
            <option value="Accommodation Issue">🏠 Accommodation Issue</option>
            <option value="Event Support">🎉 Event Support</option>
            <option value="Other">📌 Other</option>
          </select>
        </div>
        <div class="form-row">
          <label>Priority Level <span>*</span></label>
          <select id="priority_level" name="priority_level" required>
            <option value="Low">🟢 Low — Not urgent</option>
            <option value="Medium" selected>🟡 Medium — Needs attention</option>
            <option value="High">🔴 High — Urgent</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <label>Description <span>*</span></label>
        <textarea id="description" name="description" placeholder="Describe the issue in detail — location, what happened, how long it has been a problem..." rows="5" required></textarea>
        <small id="char-counter" style="color:var(--text-light); font-size:0.8rem;">0 characters</small>
      </div>

      <div id="preview-alert"></div>

      <div class="form-actions">
        <button type="button" class="btn btn-outline btn-green" onclick="previewRequest()">👁 Preview</button>
        <button type="submit" class="btn">✅ Submit Request</button>
      </div>

    </form>

    <!-- Live Preview Box -->
    <div id="preview"></div>

  </div>
</div>

<footer>
  <p>&copy; 2026 <strong>Umuganda Smart</strong> — INES Ruhengeri | Group 8, Year II C</p>
</footer>

<script src="../../assets/js/script.js"></script>
</body>
</html>
