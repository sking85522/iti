<?php
$pageTitle = 'ITI Home';
include __DIR__ . '/includes/header.php';
?>
<section class="container my-5">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="hero-slide d-flex align-items-center" style="background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80');">
                    <div class="hero-content p-4 p-lg-5">
                        <h1 class="display-6 fw-bold">Skilling Youth for Industry 4.0</h1>
                        <p class="lead">Workshops, labs, and hands-on training designed for future-ready careers.</p>
                        <a class="btn btn-success" href="/admission.php">Apply for Admission</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-slide d-flex align-items-center" style="background-image: url('https://images.unsplash.com/photo-1581092162384-8987b4cb1b5b?auto=format&fit=crop&w=1200&q=80');">
                    <div class="hero-content p-4 p-lg-5">
                        <h2 class="display-6 fw-bold">Modern Labs &amp; Safety First</h2>
                        <p class="lead">Dedicated labs, safety equipment, and certified instructors.</p>
                        <a class="btn btn-primary" href="/facilities.php">Explore Facilities</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-slide d-flex align-items-center" style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1200&q=80');">
                    <div class="hero-content p-4 p-lg-5">
                        <h2 class="display-6 fw-bold">Students. Workshops. Results.</h2>
                        <p class="lead">Placement-focused training with strong industry tie-ups.</p>
                        <a class="btn btn-success" href="/placement.php">Placement Records</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="container my-5">
    <div class="row g-4">
        <div class="col-lg-7">
            <div class="info-card p-4">
                <h2 class="section-title">About ITI</h2>
                <p>Industrial Training Institute (ITI) is a government-recognized institute offering skill-based technical education. We focus on practical training, industry-ready curriculum, and personality development to build employability for students across diverse trades.</p>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex gap-3">
                            <span class="card-icon">24</span>
                            <div>
                                <h6 class="mb-1">Years of Legacy</h6>
                                <p class="small text-muted">Established in 2000 with a commitment to excellence.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex gap-3">
                            <span class="card-icon">12</span>
                            <div>
                                <h6 class="mb-1">Trades Offered</h6>
                                <p class="small text-muted">Industry-aligned courses with expert instructors.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex gap-3">
                            <span class="card-icon">90%</span>
                            <div>
                                <h6 class="mb-1">Placement Support</h6>
                                <p class="small text-muted">Apprenticeships, campus drives, and career guidance.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex gap-3">
                            <span class="card-icon">ISO</span>
                            <div>
                                <h6 class="mb-1">NCVT/SCVT Affiliated</h6>
                                <p class="small text-muted">National &amp; State Council certifications supported.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-outline-primary mt-3" href="/about.php">Learn More</a>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="info-card p-4 h-100">
                <h3 class="section-title">Latest Notice / News</h3>
                <ul class="notice-list list-unstyled">
                    <li>
                        <strong>Admissions 2024-25 Open</strong>
                        <div class="small text-muted">Online registration starts 10 June 2024.</div>
                    </li>
                    <li>
                        <strong>Campus Placement Drive</strong>
                        <div class="small text-muted">Top recruiters visiting on 22 July 2024.</div>
                    </li>
                    <li>
                        <strong>NCVT Exam Schedule</strong>
                        <div class="small text-muted">Semester exams from 05 August 2024.</div>
                    </li>
                    <li>
                        <strong>Skill Competition Winners</strong>
                        <div class="small text-muted">Our students secured 3 medals at state level.</div>
                    </li>
                </ul>
                <a class="btn btn-success" href="/events.php">View All Notices</a>
            </div>
        </div>
    </div>
</section>

<section class="container my-5">
    <h2 class="section-title text-center mb-4">Quick Links</h2>
    <div class="row g-3 text-center">
        <div class="col-6 col-md-3"><a class="btn btn-light w-100" href="/admission.php">Admission</a></div>
        <div class="col-6 col-md-3"><a class="btn btn-light w-100" href="/courses.php">Courses</a></div>
        <div class="col-6 col-md-3"><a class="btn btn-light w-100" href="/academics.php#results">Result</a></div>
        <div class="col-6 col-md-3"><a class="btn btn-light w-100" href="/contact.php">Contact</a></div>
        <div class="col-6 col-md-3"><a class="btn btn-light w-100" href="/about.php#history">ITI History</a></div>
        <div class="col-6 col-md-3"><a class="btn btn-light w-100" href="/about.php#principal-message">Principal Message</a></div>
        <div class="col-6 col-md-3"><a class="btn btn-light w-100" href="/about.php#vision">Vision &amp; Mission</a></div>
        <div class="col-6 col-md-3"><a class="btn btn-light w-100" href="/about.php#affiliation">Affiliation Details</a></div>
    </div>
</section>

<section class="container my-5">
    <h2 class="section-title text-center mb-4">Trades Offered</h2>
    <div class="row g-4">
        <?php
        $trades = [
            ['Electrician', '2 Years', 'trades/electrician.php'],
            ['Fitter', '2 Years', 'trades/fitter.php'],
            ['Welder', '1 Year', 'trades/welder.php'],
            ['Turner', '2 Years', 'trades/turner.php'],
            ['Mechanic Diesel', '1 Year', 'trades/mechanic-diesel.php'],
            ['COPA', '1 Year', 'trades/copa.php'],
            ['Plumber', '1 Year', 'trades/plumber.php'],
            ['Draughtsman', '2 Years', 'trades/draughtsman.php'],
        ];
        foreach ($trades as $trade) {
            echo '<div class="col-md-3">';
            echo '<div class="info-card p-3 h-100">';
            echo '<h6 class="fw-bold">' . htmlspecialchars($trade[0]) . '</h6>';
            echo '<p class="small text-muted">Duration: ' . htmlspecialchars($trade[1]) . '</p>';
            echo '<a class="btn btn-outline-primary btn-sm" href="/' . htmlspecialchars($trade[2]) . '">View Details</a>';
            echo '</div></div>';
        }
        ?>
    </div>
</section>

<section class="container my-5">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="info-card p-4 h-100">
                <h3 class="section-title">Facilities</h3>
                <ul class="list-unstyled small">
                    <li>Workshops &amp; Labs</li>
                    <li>Library &amp; Computer Lab</li>
                    <li>Sports &amp; Cultural Activities</li>
                    <li>Safety Equipment</li>
                    <li>Hostel (as per availability)</li>
                </ul>
                <a class="btn btn-outline-success" href="/facilities.php">Explore Facilities</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="info-card p-4 h-100">
                <h3 class="section-title">Placement &amp; Apprenticeship</h3>
                <ul class="list-unstyled small">
                    <li>Industry Tie-ups &amp; MoUs</li>
                    <li>Apprenticeship Opportunities</li>
                    <li>Recruiter Network</li>
                    <li>Career Guidance Sessions</li>
                </ul>
                <a class="btn btn-outline-success" href="/placement.php">Placement Details</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="info-card p-4 h-100">
                <h3 class="section-title">Student Services</h3>
                <ul class="list-unstyled small">
                    <li>Attendance &amp; Examination Rules</li>
                    <li>Study Materials &amp; Projects</li>
                    <li>Student Groups &amp; Messaging</li>
                    <li>NSS / Swachh Bharat Activities</li>
                </ul>
                <a class="btn btn-outline-success" href="/academics.php">Academic Services</a>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
