<?php include 'header.php'; ?>
<section class="section-light py-5">
    <div class="container">
        <h2 class="section-title fw-bold">Faculty &amp; Instructors</h2>
        <p class="text-muted">Experienced instructors with industry exposure and certified qualifications.</p>
        <div class="row g-4 mt-3">
            <?php
            $faculty = [
                ['S. Kumar', 'Senior Instructor - Electrician', 'B.Tech (EEE)', '12 Years'],
                ['R. Singh', 'Instructor - Fitter', 'Diploma (Mechanical)', '10 Years'],
                ['P. Sharma', 'Instructor - Welder', 'ITI + CITS', '8 Years'],
                ['N. Verma', 'Instructor - COPA', 'MCA', '9 Years'],
            ];
            foreach ($faculty as $member) {
                echo '<div class="col-md-6 col-lg-3">';
                echo '<div class="info-card text-center h-100">';
                echo '<div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 72px; height: 72px;">'.substr($member[0], 0, 2).'</div>';
                echo '<h6 class="fw-semibold">'.$member[0].'</h6>';
                echo '<p class="text-muted mb-1">'.$member[1].'</p>';
                echo '<small class="text-muted">Qualification: '.$member[2].'</small><br>';
                echo '<small class="text-muted">Experience: '.$member[3].'</small>';
                echo '</div></div>';
            }
            ?>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
