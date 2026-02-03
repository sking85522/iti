<?php
$pageTitle = 'Student Login';
include __DIR__ . '/includes/header.php';
?>
<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="info-card p-4">
                <h1 class="section-title">Student Login</h1>
                <form method="post" action="#">
                    <div class="mb-3">
                        <label class="form-label">Enrollment Number</label>
                        <input class="form-control" type="text" placeholder="Enrollment number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" placeholder="Password">
                    </div>
                    <button class="btn btn-success" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
