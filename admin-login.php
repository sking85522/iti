<?php
$pageTitle = 'ITI | Admin Login';
include __DIR__ . '/includes/header.php';
?>
<section class="py-5">
  <div class="container">
    <div class="card card-shadow p-4 login-card">
      <h2 class="section-title">Admin Login</h2>
      <form>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input class="form-control" type="text" placeholder="Admin username">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input class="form-control" type="password" placeholder="Password">
        </div>
        <button class="btn btn-primary w-100" type="submit">Login</button>
        <p class="small text-muted mt-3">Admin can manage staff, students, notices, results, gallery, and trade info.</p>
      </form>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
