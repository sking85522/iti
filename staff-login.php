<?php include 'header.php'; ?>
<section class="section-light py-5">
    <div class="container">
        <h2 class="section-title fw-bold">Staff Login</h2>
        <p class="text-muted">Staff portal for attendance, assessments, and student support.</p>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 col-lg-4">
                <div class="login-card">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Staff email">
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
