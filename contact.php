<?php
$pageTitle = 'Contact';
include __DIR__ . '/includes/header.php';
?>
<section class="container my-5">
    <h1 class="section-title">Contact Us</h1>
    <div class="row g-4 mt-3">
        <div class="col-lg-5">
            <div class="info-card p-4 h-100">
                <h3>Address</h3>
                <p class="small mb-1">ITI Campus Road, City, State - 000000</p>
                <p class="small mb-1">Phone: +91 98765 43210</p>
                <p class="small">Email: info@iti.edu.in</p>
                <div class="ratio ratio-4x3 mt-3">
                    <iframe src="https://maps.google.com/maps?q=Industrial%20Training%20Institute&t=&z=13&ie=UTF8&iwloc=&output=embed" title="Google Map"></iframe>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="info-card p-4">
                <h3>Contact Form</h3>
                <form method="post" action="#">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input class="form-control" type="text" placeholder="Your name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input class="form-control" type="text" placeholder="Phone number">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" placeholder="Email address">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="4" placeholder="Your message"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
