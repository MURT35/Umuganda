<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Umuganda Smart Service Request Platform</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

<header>
  <a href="../../public/index.php" class="logo">
    <div class="logo-icon">🏡</div>
    <h1>Umuganda <span>Smart</span></h1>
  </a>
  <nav>
    <a href="../../public/index.php" class="active">Home</a>
    <a href="submit_request.php">Submit Request</a>
    <a href="login.php">Admin Login</a>
  </nav>
</header>

<!-- Hero -->
<section class="hero">
  <div class="hero-content">
    <h2>Community Service Requests, <span>Made Simple</span></h2>
    <p>
      In many Rwandan communities, service issues are still reported informally through
      phone calls or WhatsApp. This creates delays and weak accountability.
      Umuganda Smart gives your community a fast, transparent way to report and track issues.
    </p>
    <div class="hero-badges">
      <span class="hero-badge">🚰 Water Points</span>
      <span class="hero-badge">💡 Street Lights</span>
      <span class="hero-badge">🧹 Cleaning</span>
      <span class="hero-badge">💻 ICT Support</span>
      <span class="hero-badge">🏠 Accommodation</span>
      <span class="hero-badge">🎉 Events</span>
    </div>
    <a class="btn" href="submit_request.php">Submit a Request</a>
    &nbsp;
    <a class="btn btn-outline" href="login.php">Admin Login</a>
  </div>
</section>

<!-- Service Categories -->
<div class="section">
  <h2 class="section-title">What Can You Report?</h2>
  <p class="section-sub">Select the category that best describes your community issue.</p>
  <div class="cards-grid">
    <div class="card">
      <div class="card-icon">🚰</div>
      <h3>Water Problems</h3>
      <p>Report broken taps, leaking pipes, or water point failures in your area quickly.</p>
    </div>
    <div class="card">
      <div class="card-icon">💡</div>
      <h3>Street Light Issues</h3>
      <p>Alert the sector about non-functional lights on roads and public spaces.</p>
    </div>
    <div class="card">
      <div class="card-icon">🧹</div>
      <h3>Cleaning Requests</h3>
      <p>Request waste removal, sanitation, or general cleaning for community areas.</p>
    </div>
    <div class="card">
      <div class="card-icon">💻</div>
      <h3>ICT Lab Support</h3>
      <p>Get technical help for computers, internet, projectors, or lab equipment.</p>
    </div>
    <div class="card">
      <div class="card-icon">🏠</div>
      <h3>Accommodation Issues</h3>
      <p>Report student housing problems such as plumbing, electricity, or maintenance needs.</p>
    </div>
    <div class="card">
      <div class="card-icon">🎉</div>
      <h3>Event Support</h3>
      <p>Request logistics, space, or staff support for community or campus events.</p>
    </div>
  </div>
</div>

<!-- How It Works -->
<div style="background: white; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);">
  <div class="section">
    <h2 class="section-title">How It Works</h2>
    <p class="section-sub">Three simple steps from problem to resolution.</p>
    <div class="steps">
      <div class="step">
        <div class="step-num">1</div>
        <h4>Submit Your Request</h4>
        <p>Fill in the form with your name, category, priority level, and a description of the issue.</p>
      </div>
      <div class="step">
        <div class="step-num">2</div>
        <h4>Admin Reviews It</h4>
        <p>A service officer receives your request on the admin dashboard and assigns it for action.</p>
      </div>
      <div class="step">
        <div class="step-num">3</div>
        <h4>Issue Gets Resolved</h4>
        <p>The status updates from Pending → In Progress → Resolved so you can track progress.</p>
      </div>
    </div>
  </div>
</div>

<!-- CTA -->
<div class="section" style="text-align:center; padding-top: 56px; padding-bottom: 56px;">
  <h2 class="section-title" style="margin-bottom:12px;">Ready to Report an Issue?</h2>
  <p style="color:var(--text-mid); margin-bottom:28px; font-size:1rem;">
    It takes less than 2 minutes. Your request is tracked every step of the way.
  </p>
  <a class="btn" href="submit_request.php">Get Started Now</a>
</div>

<footer>
  <p>&copy; 2026 <strong>Umuganda Smart</strong> — INES Ruhengeri | Group 8, Year II C</p>
  <p style="margin-top:6px;">Built with PHP, MySQLi, HTML, CSS, JavaScript | MVC Architecture</p>
</footer>

</body>
</html>
