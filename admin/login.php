<?php
  $pageTitle = 'Login | ITI';
  include __DIR__ . '/../includes/header.php';
?>
<section class="container">
  <h1 class="section-title mb-4">Login Portal</h1>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card h-100 card-hover text-center">
        <div class="card-body">
          <h5>Admin Login</h5>
          <p class="small">Manage staff, notices, results, gallery, and analytics.</p>
          <a class="btn btn-primary btn-sm" href="/admin/admin-login.php">Login</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 card-hover text-center">
        <div class="card-body">
          <h5>Staff Login</h5>
          <p class="small">Attendance, assessments, projects, materials, messaging.</p>
          <a class="btn btn-success btn-sm" href="/admin/staff-login.php">Login</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 card-hover text-center">
        <div class="card-body">
          <h5>Student Login</h5>
          <p class="small">Results, attendance, notes, and updates.</p>
          <a class="btn btn-outline-primary btn-sm" href="/admin/student-login.php">Login</a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
