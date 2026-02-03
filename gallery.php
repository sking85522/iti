<?php
  $pageTitle = 'Gallery | ITI';
  include __DIR__ . '/includes/header.php';
?>
<section class="container">
  <h1 class="section-title mb-4">Photo Gallery</h1>
  <div class="row g-4">
    <?php
      $gallery = [
        'https://images.unsplash.com/photo-1489515217757-5fd1be406fef?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1507537297725-24a1c029d3ca?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80',
      ];
      foreach ($gallery as $image) :
    ?>
      <div class="col-md-4">
        <img class="gallery-img" src="<?php echo $image; ?>" alt="ITI gallery">
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
