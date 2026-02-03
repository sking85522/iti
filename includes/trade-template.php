<?php
  if (!isset($tradeKey, $tradeData[$tradeKey])) {
    header('Location: /courses.php');
    exit;
  }
  $trade = $tradeData[$tradeKey];
  $pageTitle = $trade['name'] . ' Trade | ITI';
  include __DIR__ . '/header.php';
?>
<section class="container">
  <div class="row align-items-center g-4">
    <div class="col-lg-8">
      <span class="badge badge-soft mb-3">Trade Details</span>
      <h1 class="section-title mb-3"><?php echo htmlspecialchars($trade['name']); ?></h1>
      <p class="lead">Industry aligned training with modern lab exposure, apprenticeship support, and campus placement guidance.</p>
    </div>
    <div class="col-lg-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6 class="fw-semibold">At a Glance</h6>
          <p class="mb-1"><strong>Duration:</strong> <?php echo htmlspecialchars($trade['duration']); ?></p>
          <p class="mb-1"><strong>Seats:</strong> <?php echo htmlspecialchars($trade['seats']); ?></p>
          <p class="mb-0"><strong>Eligibility:</strong> <?php echo htmlspecialchars($trade['eligibility']); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="container mt-5">
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="fw-semibold">Syllabus Highlights</h5>
          <p><?php echo htmlspecialchars($trade['syllabus']); ?></p>
          <h6 class="fw-semibold mt-4">Career Scope</h6>
          <p class="mb-0"><?php echo htmlspecialchars($trade['career']); ?></p>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="fw-semibold">Admission Process</h5>
          <ol class="small">
            <li>Online or offline application submission.</li>
            <li>Document verification and eligibility check.</li>
            <li>Merit list publication and seat allotment.</li>
            <li>Fee submission and admission confirmation.</li>
          </ol>
          <h6 class="fw-semibold mt-4">Documents Required</h6>
          <ul class="small">
            <li>10th/8th mark sheet</li>
            <li>Aadhaar card</li>
            <li>Passport size photographs</li>
            <li>Residence certificate</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="container mt-5">
  <div class="info-strip p-4">
    <div class="row g-3">
      <div class="col-md-4">
        <h6 class="fw-semibold">Important Dates</h6>
        <p class="small mb-0">Application: अप्रैल - जून | मेरिट लिस्ट: जुलाई | सत्र शुरू: अगस्त</p>
      </div>
      <div class="col-md-4">
        <h6 class="fw-semibold">Instructor Details</h6>
        <p class="small mb-0">Qualification: Diploma/Degree | Experience: 5+ Years</p>
      </div>
      <div class="col-md-4">
        <h6 class="fw-semibold">Training Facilities</h6>
        <p class="small mb-0">Modern workshop, safety equipment, tool kits, industry visits.</p>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/footer.php'; ?>
