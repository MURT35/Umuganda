// Umuganda Smart Service Request Platform
// JavaScript — Live Preview + Validation
// Group 8 | Year II C | INES Ruhengeri

// ── Live Preview ───────────────────────────────────────
function previewRequest() {
  const name        = document.getElementById('fullname').value.trim();
  const email       = document.getElementById('email').value.trim();
  const category    = document.getElementById('category').value;
  const priority    = document.getElementById('priority_level').value;
  const description = document.getElementById('description').value.trim();
  const preview     = document.getElementById('preview');

  if (!name || !email || !category || !description) {
    showAlert('preview-alert', 'Please fill in all fields before previewing.', 'error');
    return;
  }

  const priorityClass = {
    'Low': 'priority-low',
    'Medium': 'priority-medium',
    'High': 'priority-high'
  }[priority] || 'priority-low';

  preview.innerHTML = `
    <h4>📋 Request Preview</h4>
    <div class="preview-row">
      <span class="preview-label">Full Name:</span>
      <span class="preview-value">${escapeHtml(name)}</span>
    </div>
    <div class="preview-row">
      <span class="preview-label">Email:</span>
      <span class="preview-value">${escapeHtml(email)}</span>
    </div>
    <div class="preview-row">
      <span class="preview-label">Category:</span>
      <span class="preview-value">${escapeHtml(category)}</span>
    </div>
    <div class="preview-row">
      <span class="preview-label">Priority:</span>
      <span class="preview-value">
        <span class="priority-tag ${priorityClass}">${escapeHtml(priority)}</span>
      </span>
    </div>
    <div class="preview-row">
      <span class="preview-label">Description:</span>
      <span class="preview-value">${escapeHtml(description)}</span>
    </div>
    <p style="margin-top:14px; font-size:0.85rem; color:#4a6355;">
      ✅ Looks good? Click <strong>Submit Request</strong> to send.
    </p>
  `;
  preview.style.display = 'block';
  preview.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

// ── Escape HTML to prevent XSS ─────────────────────────
function escapeHtml(text) {
  const div = document.createElement('div');
  div.appendChild(document.createTextNode(text));
  return div.innerHTML;
}

// ── Show inline alert ──────────────────────────────────
function showAlert(containerId, message, type) {
  const el = document.getElementById(containerId);
  if (!el) return;
  el.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
  el.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

// ── Client-side form validation before submit ──────────
function validateForm() {
  const name        = document.getElementById('fullname').value.trim();
  const email       = document.getElementById('email').value.trim();
  const description = document.getElementById('description').value.trim();
  const emailRegex  = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!name) {
    showAlert('form-alert', 'Full name is required.', 'error');
    return false;
  }
  if (!email || !emailRegex.test(email)) {
    showAlert('form-alert', 'Please enter a valid email address.', 'error');
    return false;
  }
  if (!description || description.length < 10) {
    showAlert('form-alert', 'Please provide a description (at least 10 characters).', 'error');
    return false;
  }
  return true;
}

// ── Character counter for description ─────────────────
document.addEventListener('DOMContentLoaded', function () {
  const desc    = document.getElementById('description');
  const counter = document.getElementById('char-counter');
  if (desc && counter) {
    desc.addEventListener('input', function () {
      counter.textContent = desc.value.length + ' characters';
    });
  }
});
