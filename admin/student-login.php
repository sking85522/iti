<?php
  $pageTitle = 'Student Login | ITI';
  include __DIR__ . '/../includes/header.php';
?>
<section class="container">
  <div class="card login-card">
    <div class="card-body">
      <h2 class="section-title">Student Login</h2>
      <p class="small">Access attendance, results, study material, and announcements.</p>
      <form>
        <div class="mb-3">
          <label class="form-label">Enrollment No.</label>
          <input type="text" class="form-control" placeholder="Enrollment Number">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Password">
        </div>
        <button class="btn btn-outline-primary w-100" type="submit">Login</button>
      </form>
    </div>
  </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
