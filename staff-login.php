<?php
$pageTitle = 'ITI | Staff Login';
include __DIR__ . '/includes/header.php';
?>
<section class="py-5 bg-light">
  <div class="container">
    <div class="card card-shadow p-4 login-card">
      <h2 class="section-title">Staff Login</h2>
      <form>
        <div class="mb-3">
          <label class="form-label">Staff ID</label>
          <input class="form-control" type="text" placeholder="Staff ID">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input class="form-control" type="password" placeholder="Password">
        </div>
        <button class="btn btn-primary w-100" type="submit">Login</button>
        <p class="small text-muted mt-3">Staff can update attendance, assessments, and study materials.</p>
      </form>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
