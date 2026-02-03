<?php
  $pageTitle = 'Admin Login | ITI';
  include __DIR__ . '/../includes/header.php';
?>
<section class="container">
  <div class="card login-card">
    <div class="card-body">
      <h2 class="section-title">Admin Login</h2>
      <p class="small">Admin tasks: staff management, student management, notices, results, gallery, trade updates, analytics.</p>
      <form>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" placeholder="Admin ID">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Password">
        </div>
        <button class="btn btn-primary w-100" type="submit">Login</button>
      </form>
    </div>
  </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
