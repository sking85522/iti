<?php
$pageTitle = 'ITI Courses';
include __DIR__ . '/includes/header.php';
?>
<section class="container my-5">
    <h1 class="section-title">Courses &amp; Trades</h1>
    <p>Our institute offers trades designed to meet the needs of modern industries. Each trade includes classroom instruction, workshop practice, and industry exposure.</p>

    <div class="row g-4 mt-3">
        <?php
        $trades = [
            ['Electrician', '2 Years', 'Installation, maintenance, and safety practices.', '/trades/electrician.php'],
            ['Fitter', '2 Years', 'Mechanical fitting, assembly, and fabrication.', '/trades/fitter.php'],
            ['Welder', '1 Year', 'Arc, gas, and advanced welding techniques.', '/trades/welder.php'],
            ['Turner', '2 Years', 'Lathe operations and precision machining.', '/trades/turner.php'],
            ['Mechanic Diesel', '1 Year', 'Diesel engine maintenance and diagnostics.', '/trades/mechanic-diesel.php'],
            ['COPA', '1 Year', 'Computer applications, networking, and office automation.', '/trades/copa.php'],
            ['Plumber', '1 Year', 'Pipe fitting, sanitation, and water systems.', '/trades/plumber.php'],
            ['Draughtsman', '2 Years', 'Technical drawing and CAD practices.', '/trades/draughtsman.php'],
        ];
        foreach ($trades as $trade) {
            echo '<div class="col-md-6">';
            echo '<div class="info-card p-4 h-100">';
            echo '<h4>' . htmlspecialchars($trade[0]) . '</h4>';
            echo '<p class="small text-muted">Duration: ' . htmlspecialchars($trade[1]) . '</p>';
            echo '<p>' . htmlspecialchars($trade[2]) . '</p>';
            echo '<a class="btn btn-outline-primary btn-sm" href="' . htmlspecialchars($trade[3]) . '">Trade Details</a>';
            echo '</div></div>';
        }
        ?>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
