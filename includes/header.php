<?php
if (!isset($pageTitle)) {
    $pageTitle = 'ITI';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="/index.php">
            <span class="logo-circle">ITI</span>
            <div>
                <div class="fw-bold">Industrial Training Institute</div>
                <small class="text-white-50">Skilling for a stronger future</small>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="/courses.php">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="/admission.php">Admission</a></li>
                <li class="nav-item"><a class="nav-link" href="/faculty.php">Faculty</a></li>
                <li class="nav-item"><a class="nav-link" href="/academics.php">Academics</a></li>
                <li class="nav-item"><a class="nav-link" href="/facilities.php">Facilities</a></li>
                <li class="nav-item"><a class="nav-link" href="/events.php">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="/gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="/placement.php">Placement</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact.php">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
