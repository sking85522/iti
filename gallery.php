<?php
$pageTitle = 'ITI | Gallery';
include __DIR__ . '/includes/header.php';
?>
<section class="py-5 bg-light">
  <div class="container">
    <h1 class="section-title">Photo Gallery</h1>
    <div class="row g-4 mt-3 gallery-grid">
      <?php
      $images = [
        'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=800&q=60',
        'https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?auto=format&fit=crop&w=800&q=60',
        'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=800&q=60',
        'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=800&q=60',
        'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=60',
        'https://images.unsplash.com/photo-1513530534585-c7b1394c6d51?auto=format&fit=crop&w=800&q=60'
      ];
      foreach ($images as $img) {
        echo "<div class=\"col-md-4\"><img src=\"$img\" alt=\"ITI Gallery\"></div>";
      }
      ?>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
