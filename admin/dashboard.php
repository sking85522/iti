<?php
$pageTitle = 'Admin Dashboard';
include __DIR__ . '/../includes/header.php';
?>
<section class="container my-5">
    <h1 class="section-title">Admin Dashboard</h1>
    <p class="small">Use the modules below to manage ITI content and student services.</p>
    <div class="row g-4 mt-3">
        <div class="col-md-6">
            <div class="info-card p-4 h-100">
                <h4>Academic Management</h4>
                <ul class="small">
                    <li>Student Attendance</li>
                    <li>Assessment &amp; Projects</li>
                    <li>Result Upload</li>
                    <li>Study Materials</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-card p-4 h-100">
                <h4>Communication</h4>
                <ul class="small">
                    <li>Student Group Messaging</li>
                    <li>Notice Upload</li>
                    <li>Blog or Post Management</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-card p-4 h-100">
                <h4>Data &amp; Users</h4>
                <ul class="small">
                    <li>Manage Staff</li>
                    <li>Manage Students</li>
                    <li>Viewer Analytics</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-card p-4 h-100">
                <h4>Content Management</h4>
                <ul class="small">
                    <li>Gallery Update</li>
                    <li>Trade Info Update</li>
                    <li>Placement Updates</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
