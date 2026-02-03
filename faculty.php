<?php
  $pageTitle = 'Faculty | ITI';
  include __DIR__ . '/includes/header.php';
?>
<section class="container">
  <h1 class="section-title mb-4">Faculty & Instructors</h1>
  <div class="row g-4">
    <?php
      $faculty = [
        ['name' => 'Mr. R. Sharma', 'trade' => 'Electrician', 'qualification' => 'Diploma in Electrical', 'experience' => '12 Years'],
        ['name' => 'Mrs. S. Verma', 'trade' => 'Fitter', 'qualification' => 'B.Tech Mechanical', 'experience' => '10 Years'],
        ['name' => 'Mr. A. Khan', 'trade' => 'COPA', 'qualification' => 'MCA', 'experience' => '8 Years'],
        ['name' => 'Mrs. P. Joshi', 'trade' => 'Welder', 'qualification' => 'Diploma in Welding', 'experience' => '9 Years'],
      ];
      foreach ($faculty as $member) :
    ?>
      <div class="col-md-6">
        <div class="card h-100 card-hover">
          <div class="card-body">
            <h5 class="fw-semibold"><?php echo $member['name']; ?></h5>
            <p class="small mb-1"><strong>Trade:</strong> <?php echo $member['trade']; ?></p>
            <p class="small mb-1"><strong>Qualification:</strong> <?php echo $member['qualification']; ?></p>
            <p class="small mb-0"><strong>Experience:</strong> <?php echo $member['experience']; ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
