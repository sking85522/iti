<?php
$pageTitle = 'Faculty';
include __DIR__ . '/includes/header.php';
?>
<section class="container my-5">
    <h1 class="section-title">Faculty &amp; Instructors</h1>
    <p>Our instructors are certified professionals with industry experience and a passion for teaching.</p>

    <div class="row g-4 mt-3">
        <?php
        $faculty = [
            ['Mr. Rajesh Kumar', 'Electrician Instructor', 'Diploma in Electrical, 10+ yrs experience'],
            ['Ms. Priya Sharma', 'COPA Instructor', 'BCA, 8+ yrs experience'],
            ['Mr. Amit Verma', 'Fitter Instructor', 'Diploma in Mechanical, 12+ yrs experience'],
            ['Ms. Kavita Singh', 'Draughtsman Instructor', 'B.Tech, 6+ yrs experience'],
        ];
        foreach ($faculty as $member) {
            echo '<div class="col-md-6">';
            echo '<div class="info-card p-4 h-100">';
            echo '<div class="d-flex align-items-center gap-3">';
            echo '<div class="card-icon">' . htmlspecialchars(substr($member[0], 0, 1)) . '</div>';
            echo '<div>'; 
            echo '<h5 class="mb-1">' . htmlspecialchars($member[0]) . '</h5>';
            echo '<div class="small text-muted">' . htmlspecialchars($member[1]) . '</div>';
            echo '</div></div>';
            echo '<p class="small mt-3">Qualification &amp; Experience: ' . htmlspecialchars($member[2]) . '</p>';
            echo '<p class="small">Photo: To be updated</p>';
            echo '</div></div>';
        }
        ?>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
