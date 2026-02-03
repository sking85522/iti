<?php
  $pageTitle = 'Staff Login | ITI';
  include __DIR__ . '/../includes/header.php';
?>
<section class="container">
  <div class="card login-card">
    <div class="card-body">
      <h2 class="section-title">Staff Login</h2>
      <p class="small">Staff work: attendance, assessments, projects, posts, student group messaging, study materials.</p>
      <form>
        <div class="mb-3">
          <label class="form-label">Staff ID</label>
          <input type="text" class="form-control" placeholder="Staff ID">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Password">
        </div>
        <button class="btn btn-success w-100" type="submit">Login</button>
      </form>
    </div>
  </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
