<?php
$pageTitle = 'Gallery';
include __DIR__ . '/includes/header.php';
?>
<section class="container my-5">
    <h1 class="section-title">Photo Gallery</h1>
    <p>Snapshots from our workshops, labs, and student activities.</p>
    <div class="row g-3 gallery-grid mt-3">
        <?php
        $images = [
            'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1581092162384-8987b4cb1b5b?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=800&q=80',
        ];
        foreach ($images as $image) {
            echo '<div class="col-6 col-md-4">';
            echo '<img src="' . htmlspecialchars($image) . '" alt="ITI Activity">';
            echo '</div>';
        }
        ?>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
