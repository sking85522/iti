<?php
  $pageTitle = 'Contact Us | ITI';
  include __DIR__ . '/includes/header.php';
?>
<section class="container">
  <div class="row g-4">
    <div class="col-lg-6">
      <h1 class="section-title">Contact Us</h1>
      <p>For admission, placement, or general queries, reach us below.</p>
      <div class="card">
        <div class="card-body">
          <h6 class="fw-semibold">Address</h6>
          <p class="small">ITI Campus Road, City, State - 000000</p>
          <h6 class="fw-semibold">Phone</h6>
          <p class="small">+91-90000-22222</p>
          <h6 class="fw-semibold">Email</h6>
          <p class="small">info@iti.edu.in</p>
        </div>
      </div>
      <div class="ratio ratio-4x3 mt-4 rounded-4 overflow-hidden">
        <iframe src="https://maps.google.com/maps?q=Industrial%20Training%20Institute&t=&z=13&ie=UTF8&iwloc=&output=embed" title="ITI Map"></iframe>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="fw-semibold">Contact Form</h5>
          <form>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" placeholder="Your name">
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" placeholder="Email address">
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
