<?php include 'header.php'; ?>
<section class="section-light py-5">
    <div class="container">
        <h2 class="section-title fw-bold">Student Login</h2>
        <p class="text-muted">Student portal for attendance, results, and study materials.</p>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 col-lg-4">
                <div class="login-card">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Enrollment No.</label>
                            <input type="text" class="form-control" placeholder="Enrollment number">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
