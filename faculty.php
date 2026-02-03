<?php
$pageTitle = 'ITI | Faculty';
include __DIR__ . '/includes/header.php';
?>
<section class="py-5 bg-light">
  <div class="container">
    <h1 class="section-title">Faculty & Instructors</h1>
    <p>Qualified instructors with strong industry experience guide each trade.</p>
    <div class="row g-4 mt-3">
      <?php
      $faculty = [
        ['Rajesh Kumar', 'Electrician', 'Diploma in Electrical', '12 years'],
        ['Sunita Sharma', 'COPA', 'BCA, DOEACC', '9 years'],
        ['Amit Verma', 'Fitter', 'Diploma in Mechanical', '14 years'],
        ['Priya Singh', 'Draughtsman', 'Diploma in Civil', '10 years'],
        ['Mohit Das', 'Welder', 'NCVT Certified', '11 years'],
        ['Neha Gupta', 'Mechanic Diesel', 'B.Tech Mechanical', '8 years']
      ];
      foreach ($faculty as $member) {
        [$name, $trade, $qualification, $experience] = $member;
        echo "<div class=\"col-md-4\"><div class=\"card card-shadow h-100 p-3\"><div class=\"d-flex align-items-center gap-3\"><div class=\"rounded-circle bg-primary text-white d-flex align-items-center justify-content-center\" style=\"width:52px;height:52px;\">ITI</div><div><h5 class=\"mb-0\">$name</h5><small>$trade Instructor</small></div></div><hr><p class=\"mb-1\"><strong>Qualification:</strong> $qualification</p><p class=\"mb-0\"><strong>Experience:</strong> $experience</p></div></div>";
      }
      ?>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
