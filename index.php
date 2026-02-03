<?php
$pageTitle = 'ITI | Home';
include __DIR__ . '/includes/header.php';
?>
<section class="hero">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <span class="badge badge-green mb-3">Government ITI</span>
        <h1 class="display-5 fw-bold">Industrial Training Institute: Skill Development for a Stronger Tomorrow</h1>
        <p class="lead">Empowering students with industry-relevant trades, practical workshops, and career-ready training aligned with NCVT/SCVT standards.</p>
        <div class="d-flex gap-3 flex-wrap">
          <a class="btn btn-light" href="/admission.php">Admission 2024</a>
          <a class="btn btn-outline-light" href="/courses.php">Explore Trades</a>
        </div>
      </div>
      <div class="col-lg-5 mt-4 mt-lg-0">
        <div class="card card-shadow p-4 text-dark">
          <h5 class="fw-bold">Quick Links</h5>
          <ul class="list-unstyled mb-0">
            <li><a href="/admission.php">Admission</a></li>
            <li><a href="/academics.php">Academic Calendar</a></li>
            <li><a href="/placement.php">Placement & Apprenticeship</a></li>
            <li><a href="/gallery.php">Photo Gallery</a></li>
            <li><a href="/contact.php">Contact Form</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8">
        <h2 class="section-title">Banner / Slider</h2>
        <div id="itiCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#itiCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Workshop"></button>
            <button type="button" data-bs-target="#itiCarousel" data-bs-slide-to="1" aria-label="Lab"></button>
            <button type="button" data-bs-target="#itiCarousel" data-bs-slide-to="2" aria-label="Students"></button>
          </div>
          <div class="carousel-inner rounded-3 shadow">
            <div class="carousel-item active">
              <img src="https://images.unsplash.com/photo-1581092334564-17f08c4d0c26?auto=format&fit=crop&w=1400&q=60" class="d-block w-100" alt="Workshop">
              <div class="carousel-caption d-none d-md-block">
                <h5>Advanced Workshops</h5>
                <p>Hands-on training with modern tools and safety equipment.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1400&q=60" class="d-block w-100" alt="Lab">
              <div class="carousel-caption d-none d-md-block">
                <h5>Industry Labs</h5>
                <p>Dedicated labs for each trade and skill competition prep.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1400&q=60" class="d-block w-100" alt="Students">
              <div class="carousel-caption d-none d-md-block">
                <h5>Student Success</h5>
                <p>Placement support, apprenticeship tie-ups, and career guidance.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <h2 class="section-title">Latest Notice / News</h2>
        <div class="notice-board p-3 rounded-3 shadow-sm">
          <ul class="list-unstyled mb-0">
            <li class="mb-3">
              <strong>Admission Open:</strong> Online/Offline registration for 2024 batch starts 10 June.
            </li>
            <li class="mb-3">
              <strong>Result:</strong> NCVT semester results available in Academics section.
            </li>
            <li class="mb-3">
              <strong>Placement Drive:</strong> AutoTech and PowerGrid visit campus on 25 July.
            </li>
            <li>
              <strong>Skill Competition:</strong> District-level skill meet registration open.
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <h2 class="section-title">About ITI</h2>
        <p>ITI is a premier institute focused on vocational education, practical training, and employable skills. We follow NCVT/SCVT guidelines to deliver quality training in multiple trades, supported by modern labs, qualified instructors, and strong industry linkages.</p>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="card card-shadow p-3 h-100">
              <h6 class="fw-bold">Vision & Mission</h6>
              <p class="mb-0">Empower youth with globally competitive skills and lifelong learning opportunities.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-shadow p-3 h-100">
              <h6 class="fw-bold">Principal's Message</h6>
              <p class="mb-0">"We nurture talent through discipline, innovation, and industry-ready training."</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="section-title">ITI Profile</h2>
        <div class="card card-shadow p-4">
          <div class="row">
            <div class="col-sm-6">
              <p><strong>Established:</strong> 1998</p>
              <p><strong>Location:</strong> District HQ, State</p>
              <p><strong>Affiliation:</strong> NCVT / SCVT</p>
            </div>
            <div class="col-sm-6">
              <p><strong>Trades:</strong> 9+ major trades</p>
              <p><strong>Seats:</strong> 720+</p>
              <p><strong>Campus:</strong> Workshops, labs, hostel, library</p>
            </div>
          </div>
          <a class="btn btn-primary mt-2" href="/about.php">Read Full History</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title">Trades Offered</h2>
    <div class="row g-4 mt-2">
      <?php
      $trades = [
        'Electrician',
        'Fitter',
        'Welder',
        'Turner',
        'Mechanic Diesel',
        'COPA',
        'Plumber',
        'Draughtsman',
        'Electronics Mechanic'
      ];
      foreach ($trades as $trade) {
        $slug = strtolower(str_replace(' ', '-', $trade));
        echo "<div class=\"col-md-4\"><div class=\"card card-shadow h-100 p-3\"><h5>$trade</h5><p>Duration, eligibility, and lab exposure with strong placement support.</p><a class=\"btn btn-outline-primary btn-sm\" href=\"/trades/$slug.php\">View Details</a></div></div>";
      }
      ?>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <h2 class="section-title">Admission Snapshot</h2>
        <ul class="list-group">
          <li class="list-group-item">Eligibility: 8th/10th pass as per trade</li>
          <li class="list-group-item">Mode: Online + Offline</li>
          <li class="list-group-item">Documents: ID, marksheet, domicile</li>
          <li class="list-group-item">Important Dates: June - July</li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h2 class="section-title">Facilities</h2>
        <ul class="list-group">
          <li class="list-group-item">Workshops & Labs</li>
          <li class="list-group-item">Library & Computer Lab</li>
          <li class="list-group-item">Hostel (if available)</li>
          <li class="list-group-item">Sports & Safety Equipment</li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h2 class="section-title">Student Corner</h2>
        <ul class="list-group">
          <li class="list-group-item">Time Table & Attendance Rules</li>
          <li class="list-group-item">Examination & Result Portal</li>
          <li class="list-group-item">Study Material & Group Messaging</li>
          <li class="list-group-item">NSS / Swachh Bharat Activities</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
