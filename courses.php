<?php include 'header.php'; ?>
<section class="section-light py-5">
    <div class="container">
        <h2 class="section-title fw-bold">Courses &amp; Trades</h2>
        <p class="text-muted">Detailed trade information including duration, seats, eligibility, syllabus, and career scope.</p>
        <div class="row g-4 mt-3">
            <?php
            $trades = [
                ['Electrician', '2 Years', '10th Pass', '48', 'trades/electrician.php'],
                ['Fitter', '2 Years', '10th Pass', '48', 'trades/fitter.php'],
                ['Welder', '1 Year', '8th Pass', '32', 'trades/welder.php'],
                ['Turner', '2 Years', '10th Pass', '32', 'trades/turner.php'],
                ['Mechanic Diesel', '1 Year', '10th Pass', '24', 'trades/mechanic-diesel.php'],
                ['COPA', '1 Year', '10th Pass', '48', 'trades/copa.php'],
                ['Plumber', '1 Year', '8th Pass', '32', 'trades/plumber.php'],
                ['Draughtsman (Civil)', '2 Years', '10th Pass', '24', 'trades/draughtsman.php'],
            ];
            foreach ($trades as $trade) {
                echo '<div class="col-md-6 col-lg-3">';
                echo '<div class="trade-card">';
                echo '<h6 class="fw-semibold">'.$trade[0].'</h6>';
                echo '<p class="text-muted mb-1">Duration: '.$trade[1].'</p>';
                echo '<p class="text-muted mb-1">Eligibility: '.$trade[2].'</p>';
                echo '<p class="text-muted mb-3">Seats: '.$trade[3].'</p>';
                echo '<a class="btn btn-sm btn-outline-primary" href="'.$trade[4].'">View Details</a>';
                echo '</div></div>';
            }
            ?>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
