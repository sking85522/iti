<?php
require __DIR__ . '/includes/init.php';
$pageTitle = 'Contact Techelevatex';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';
?>
<section class="page-hero">
  <div class="container">
    <h1>Contact Us</h1>
    <p>Tell us about your exam panel, workflow, or hosting needs.</p>
  </div>
</section>

<section class="section">
  <div class="container split">
    <form class="form-card">
      <label>
        Full Name
        <input type="text" placeholder="Your name" />
      </label>
      <label>
        Email
        <input type="email" placeholder="you@domain.com" />
      </label>
      <label>
        Message
        <textarea rows="4" placeholder="Describe your project"></textarea>
      </label>
      <button class="btn primary" type="submit">Send Message</button>
    </form>
    <div>
      <h3>Reach our team</h3>
      <p>Email: hello@techelevatex.in</p>
      <p>Support: support@techelevatex.in</p>
      <p>Office hours: Mon-Sat, 9 AM - 6 PM IST</p>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
