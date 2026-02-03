<?php
$pageTitle = 'ITI | Courses';
include __DIR__ . '/includes/header.php';
?>
<section class="py-5 bg-light">
  <div class="container">
    <h1 class="section-title">Courses / Trades</h1>
    <p>Explore detailed trade pages with duration, seats, eligibility, syllabus, and career scope.</p>
    <div class="row g-4 mt-3">
      <?php
      $tradeCards = [
        ['Electrician', '2 years', '240 seats', 'Strong placement in power & manufacturing.'],
        ['Fitter', '2 years', '160 seats', 'Core trade with workshop focus.'],
        ['Welder', '1 year', '120 seats', 'High demand in fabrication industry.'],
        ['Turner', '2 years', '80 seats', 'Precision machining and CNC exposure.'],
        ['Mechanic Diesel', '1 year', '100 seats', 'Automotive and heavy vehicle focus.'],
        ['COPA', '1 year', '200 seats', 'Computer applications and office automation.'],
        ['Plumber', '1 year', '60 seats', 'Infrastructure and utility services.'],
        ['Draughtsman', '2 years', '80 seats', 'CAD drafting with civil & mechanical.'],
        ['Electronics Mechanic', '2 years', '80 seats', 'Repair and maintenance of electronics.']
      ];
      foreach ($tradeCards as $trade) {
        [$name, $duration, $seats, $summary] = $trade;
        $slug = strtolower(str_replace(' ', '-', $name));
        echo "<div class=\"col-md-4\"><div class=\"card card-shadow h-100 p-3\"><h5>$name</h5><p class=\"mb-1\"><strong>Duration:</strong> $duration</p><p class=\"mb-1\"><strong>Seats:</strong> $seats</p><p>$summary</p><a class=\"btn btn-outline-primary btn-sm\" href=\"/trades/$slug.php\">Trade Details</a></div></div>";
      }
      ?>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
