<?php include 'header.php'; ?>
<section class="section-light py-5">
    <div class="container">
        <h2 class="section-title fw-bold">Photo Gallery</h2>
        <p class="text-muted">Campus activities, workshops, and student achievements.</p>
        <div class="row g-4 gallery-grid mt-3">
            <?php
            $images = [
                'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1507537297725-24a1c029d3ca?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80',
            ];
            foreach ($images as $image) {
                echo '<div class="col-sm-6 col-lg-4">';
                echo '<img src="'.$image.'" class="img-fluid" alt="ITI gallery">';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
