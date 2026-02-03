<?php
$pageTitle = 'ITI | Student Login';
include __DIR__ . '/includes/header.php';
?>
<section class="py-5">
  <div class="container">
    <div class="card card-shadow p-4 login-card">
      <h2 class="section-title">Student Login</h2>
      <form>
        <div class="mb-3">
          <label class="form-label">Enrollment Number</label>
          <input class="form-control" type="text" placeholder="Enrollment number">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input class="form-control" type="password" placeholder="Password">
        </div>
        <button class="btn btn-primary w-100" type="submit">Login</button>
        <p class="small text-muted mt-3">Students can access results, timetable, and study materials.</p>
      </form>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
