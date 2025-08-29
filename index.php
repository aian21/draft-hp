<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HealthPaws - Dashboard</title>
  <!-- Local Bootstrap -->
  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <style>
    body { font-family: 'Poppins', sans-serif; background: #f5e9f3ff; padding-bottom: 140px; opacity: 0; transition: opacity 0.6s ease; }
    body.fade-in { opacity: 1; }

    .card { border-radius: 15px; box-shadow: 0 6px 12px rgba(0,0,0,0.1); }
    h2 { color: #2c3e50; font-weight: 600; }

    /* Logo */
    .logo { text-align: center; margin: 10px 0 20px; }
    .logo img { width: 140px; height: auto; }    

    /* Floating Bottom Navbar Frame */
    .bottom-frame {
      position: fixed;
      bottom: 50px;
      left: 50%;
      transform: translateX(-50%);
      border-radius: 25px;
      padding: 10px 15px;

         
      display: flex;
      align-items: center;
      z-index: 1000;
    }

    /* Bottom Navigation */
    .bottom-nav {
      display: flex;
      justify-content: space-around;
      align-items: center;
      background: rgba(33, 37, 41, 0.7);
      border-radius: 20px;
      padding: 12px 0;
      width: 400px;
    }
    .bottom-nav a {
      color: #e5e7eb;
      text-align: center;
      text-decoration: none;
      flex: 1;
      font-weight: 500;
      transition: all 0.2s ease;
    }
    .bottom-nav small { display: block; font-size: 12px; margin-top: 2px; }

    /* Floating User Profile Button */
    .profile-btn {
      margin-left: 15px;
      width: 60px;
      height: 60px;
      border-radius: 20px;
      background: rgba(33, 37, 41, 0.7);
      backdrop-filter: blur(12px);
      box-shadow: 0 6px 16px rgba(0,0,0,0.25);
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
    }
    .profile-btn img { width: 40px; height: 40px; border-radius: 50%; }

    /* Dropdown Menu */
    .profile-dropdown {
      position: fixed;
      bottom: 110px;
      right: calc(50% - 200px - 85px);
      background: rgba(33, 37, 41, 0.85);
      backdrop-filter: blur(12px);
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.25);
      display: none;
      flex-direction: column;
      min-width: 150px;
      overflow: hidden;
      opacity: 0;
      transform: translateY(10px);
      transition: all 0.3s ease;
    }
    .profile-dropdown.show { display: flex; opacity: 1; transform: translateY(0); }
    .profile-dropdown a { color: #fff; padding: 10px 15px; text-decoration: none; transition: background 0.2s; }
    .profile-dropdown a:hover { background: rgba(255,255,255,0.1); }

    /* Modal Customization */
    .modal-content { border-radius: 20px; box-shadow: 0 8px 20px rgba(0,0,0,0.2); }
    .modal-header { border-top-left-radius: 20px; border-top-right-radius: 20px; }

    /* ---------------------- Pink Theme ---------------------- */
    :root {
      --hp-pink: #e78fb3;
      --hp-pink-hover: #d6739c;
    }

    /* Buttons */
    .btn-primary,
    .btn-success {
      background-color: var(--hp-pink);
      border-color: var(--hp-pink);
    }
    .btn-primary:hover,
    .btn-success:hover {
      background-color: var(--hp-pink-hover);
      border-color: var(--hp-pink-hover);
    }

    /* Outline Buttons */
    .btn-outline-primary,
    .btn-outline-success {
      color: var(--hp-pink);
      border-color: var(--hp-pink);
    }
    .btn-outline-primary:hover,
    .btn-outline-success:hover {
      background-color: var(--hp-pink);
      color: #fff;
    }

    /* Bottom nav active/hover */
    .bottom-nav a.active,
    .bottom-nav a:hover {
      color: var(--hp-pink);
      transform: scale(1.1);
    }

    /* Modal Header */
    .modal-header {
      background: var(--hp-pink);
      color: #fff;
    }
  </style>
</head>
<body>

  <!-- Logo -->
  <div class="logo">
    <img src="img/logo.png" alt="HealthPaws Logo">
  </div>

  <!-- Dashboard Page -->
  <div class="container py-3">
    <h2 class="mb-4 text-center">System Dashboard</h2>

    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-6 col-md-3">
        <div class="card p-3 bg-light text-center"><h3>120</h3><p>Registered Pets</p></div>
      </div>
      <div class="col-6 col-md-3">
        <div class="card p-3 bg-light text-center"><h3>45</h3><p>Appointments</p></div>
      </div>
      <div class="col-6 col-md-3">
        <div class="card p-3 bg-light text-center"><h3>300+</h3><p>Vaccinations</p></div>
      </div>
      <div class="col-6 col-md-3">
        <div class="card p-3 bg-light text-center"><h3>12</h3><p>Clinics</p></div>
      </div>
    </div>

    <!-- Quick Links -->
    <div class="row g-3 mb-4">
      <div class="col-md-6">
        <div class="card p-4 bg-white text-center">
          <h5>📅 Schedule an Appointment</h5>
          <button class="btn btn-primary mt-2">Go to Appointments</button>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card p-4 bg-white text-center">
          <h5>🐾 View a Pet by ID</h5>
          <div class="input-group mt-2">
            <input type="text" class="form-control" placeholder="Enter Pet ID">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#petModal">Search</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Upcoming and Recent Activities -->
    <div class="row g-3">
      <div class="col-md-6">
        <div class="card p-4 bg-white h-100">
          <h5 class="mb-3">Upcoming Appointments</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">🐶 Bella - Vaccination - Tomorrow 10AM</li>
            <li class="list-group-item">🐱 Milo - Check-up - Sep 2, 2PM</li>
            <li class="list-group-item">🐾 Max - Surgery Follow-up - Sep 5, 9AM</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card p-4 bg-white h-100">
          <h5 class="mb-3">Recent Activities</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">💉 Bella got her Rabies Vaccine</li>
            <li class="list-group-item">📅 Appointment booked for Milo</li>
            <li class="list-group-item">💳 Payment recorded from Max’s owner</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Pet Modal -->
  <div class="modal fade" id="petModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pet Details</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p><strong>Pet ID:</strong> P-001</p>
          <p><strong>Name:</strong> Bella</p>
          <p><strong>Breed:</strong> Golden Retriever</p>
          <p><strong>Owner:</strong> John Doe</p>
          <p><strong>Last Visit:</strong> Aug 15, 2025</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary">✏️ Edit Pet</button>
          <button type="button" class="btn btn-outline-success">📱 View QR Code</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Floating Bottom Navbar Frame -->
  <div class="bottom-frame">
    <!-- Bottom Navbar -->
    <div class="bottom-nav">
      <a href="dashboard.html" class="active">📊<br><small>Dashboard</small></a>
      <a href="pets.html">🐶<br><small>Pets</small></a>
      <a href="vaccinations.html">💉<br><small>Vaccines</small></a>
      <a href="appointments.html">📅<br><small>Appointments</small></a>
      <a href="billing.html">💳<br><small>Billing</small></a>
    </div>

    <!-- Profile Button -->
    <div class="profile-btn" id="profileBtn">
      <img src="img/profile.jpg" alt="User">
    </div>
  </div>

  <!-- Profile Dropdown -->
  <div class="profile-dropdown" id="profileDropdown">
    <a href="profile.html">👤 View Profile</a>
    <a href="settings.html">⚙️ Settings</a>
    <a href="logout.html">🚪 Logout</a>
  </div>

  <!-- Local Bootstrap JS -->
  <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Fade in effect when page loads
    window.addEventListener("DOMContentLoaded", () => {
      document.body.classList.add("fade-in");
    });

    // Profile Dropdown Toggle
    const profileBtn = document.getElementById("profileBtn");
    const profileDropdown = document.getElementById("profileDropdown");

    profileBtn.addEventListener("click", () => {
      profileDropdown.classList.toggle("show");
    });

    window.addEventListener("click", function(event) {
      if (!profileBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
        profileDropdown.classList.remove("show");
      }
    });
  </script>
</body>
</html>
