<?php
$pageTitle = 'ITI | Contact Us';
include __DIR__ . '/includes/header.php';
?>
<section class="py-5 bg-light">
  <div class="container">
    <h1 class="section-title">Contact Us</h1>
    <div class="row g-4 mt-3">
      <div class="col-lg-5">
        <div class="card card-shadow p-4 h-100">
          <h4>Address</h4>
          <p>Industrial Training Institute, Main Road, District HQ, State</p>
          <p><strong>Phone:</strong> +91-00000-00000</p>
          <p><strong>Email:</strong> info@iti.edu</p>
          <div class="map-placeholder">Google Map Placeholder</div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="card card-shadow p-4 h-100">
          <h4>Contact Form</h4>
          <form>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input class="form-control" type="text" placeholder="Your name">
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input class="form-control" type="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea class="form-control" rows="4" placeholder="Write your message"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
