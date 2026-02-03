<?php
  $pageTitle = 'ITI | Home';
  include __DIR__ . '/includes/header.php';
?>
<section class="container">
  <div class="hero-banner mb-5">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <span class="badge text-bg-light text-dark mb-3">Welcome to ITI</span>
        <h1 class="display-5 fw-bold">Skilling youth for a stronger India</h1>
        <p class="lead">Industrial Training Institute with NCVT/SCVT affiliation, modern labs, and job-ready training.</p>
        <div class="d-flex flex-wrap gap-2">
          <a class="btn btn-light fw-semibold" href="/admission.php">Admission 2024</a>
          <a class="btn btn-outline-light fw-semibold" href="/courses.php">Explore Trades</a>
        </div>
      </div>
      <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
        <div class="bg-white text-dark p-4 rounded-4 shadow">
          <h6 class="fw-semibold">Notice Board</h6>
          <ul class="notice-list small mb-0">
            <li>🔔 Online admission forms open till 30 June 2024.</li>
            <li>📌 Apprenticeship mela on 15 July 2024.</li>
            <li>📝 Semester exams start from 5 August 2024.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container mb-5">
  <div class="row g-4">
    <div class="col-lg-8">
      <div id="itiCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner rounded-4">
          <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1400&q=80" class="d-block w-100" alt="Workshop">
          </div>
          <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1519452575417-564c1401ecc0?auto=format&fit=crop&w=1400&q=80" class="d-block w-100" alt="Lab">
          </div>
          <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1400&q=80" class="d-block w-100" alt="Students">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#itiCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#itiCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card h-100 card-hover">
        <div class="card-body">
          <h4 class="section-title">About ITI</h4>
          <p>ITI offers skill-based training for Electrician, Fitter, Welder, COPA, and more. We focus on practical learning, industry tie-ups, and placements.</p>
          <a class="btn btn-primary" href="/about.php">Read More</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container mb-5">
  <div class="row g-4">
    <div class="col-lg-3 col-md-6">
      <div class="card text-center card-hover">
        <div class="card-body">
          <h6 class="text-uppercase text-muted">Students</h6>
          <h3 class="fw-bold">1,200+</h3>
          <p class="small">Trained across 8 trades.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card text-center card-hover">
        <div class="card-body">
          <h6 class="text-uppercase text-muted">Placement</h6>
          <h3 class="fw-bold">82%</h3>
          <p class="small">Campus placement rate.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card text-center card-hover">
        <div class="card-body">
          <h6 class="text-uppercase text-muted">Workshops</h6>
          <h3 class="fw-bold">12+</h3>
          <p class="small">Modern labs & tools.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card text-center card-hover">
        <div class="card-body">
          <h6 class="text-uppercase text-muted">Years</h6>
          <h3 class="fw-bold">25+</h3>
          <p class="small">Experience in skill training.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container mb-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="section-title">Quick Links</h3>
    <a class="btn btn-outline-primary btn-sm" href="/contact.php">Need Help?</a>
  </div>
  <div class="row g-3 quick-links">
    <div class="col-md-3"><a class="card p-3 card-hover" href="/admission.php">Admission</a></div>
    <div class="col-md-3"><a class="card p-3 card-hover" href="/courses.php">Courses</a></div>
    <div class="col-md-3"><a class="card p-3 card-hover" href="/academics.php">Result</a></div>
    <div class="col-md-3"><a class="card p-3 card-hover" href="/contact.php">Contact</a></div>
    <div class="col-md-3"><a class="card p-3 card-hover" href="/about.php">ITI History</a></div>
    <div class="col-md-3"><a class="card p-3 card-hover" href="/about.php#vision">Vision & Mission</a></div>
    <div class="col-md-3"><a class="card p-3 card-hover" href="/admission.php#important-dates">Important Dates</a></div>
    <div class="col-md-3"><a class="card p-3 card-hover" href="/admin/login.php">Admin Login</a></div>
  </div>
</section>

<section class="container mb-5">
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card h-100">
        <div class="card-body">
          <h4 class="section-title">Latest News & Notices</h4>
          <ul class="notice-list">
            <li>Admission counselling schedule released (June 2024).</li>
            <li>Industry visit planned for Electrician trade.</li>
            <li>Skill competition registration open for all trades.</li>
            <li>NSS & Swachh Bharat activities on campus.</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card h-100">
        <div class="card-body">
          <h4 class="section-title">Principal's Message</h4>
          <p>“Our mission is to create skilled professionals who can meet industry demands. We provide quality training, discipline, and a supportive environment.”</p>
          <p class="fw-semibold">- Principal / Superintendent</p>
          <a class="btn btn-outline-primary" href="/about.php#message">Read full message</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container mb-5">
  <h3 class="section-title mb-3">Our Trades</h3>
  <div class="row g-4">
    <div class="col-md-3"><a class="card p-4 card-hover" href="/trades/electrician.php">Electrician</a></div>
    <div class="col-md-3"><a class="card p-4 card-hover" href="/trades/fitter.php">Fitter</a></div>
    <div class="col-md-3"><a class="card p-4 card-hover" href="/trades/welder.php">Welder</a></div>
    <div class="col-md-3"><a class="card p-4 card-hover" href="/trades/turner.php">Turner</a></div>
    <div class="col-md-3"><a class="card p-4 card-hover" href="/trades/mechanic-diesel.php">Mechanic Diesel</a></div>
    <div class="col-md-3"><a class="card p-4 card-hover" href="/trades/copa.php">COPA</a></div>
    <div class="col-md-3"><a class="card p-4 card-hover" href="/trades/plumber.php">Plumber</a></div>
    <div class="col-md-3"><a class="card p-4 card-hover" href="/trades/draughtsman.php">Draughtsman</a></div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
