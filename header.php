<?php
$current = basename($_SERVER['PHP_SELF']);
$basePath = basename(dirname($_SERVER['PHP_SELF'])) === 'trades' ? '../' : '';
function nav_active($page, $current) {
    return $page === $current ? 'active' : '';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Industrial Training Institute (ITI)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo $basePath; ?>assets/css/style.css" rel="stylesheet">
</head>
<body>
<header class="site-header border-bottom bg-white sticky-top">
    <div class="top-bar py-2">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex align-items-center gap-3">
                <span><i class="bi bi-telephone"></i> +91-00000-00000</span>
                <span><i class="bi bi-envelope"></i> info@iti.ac.in</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a class="btn btn-sm btn-outline-primary" href="<?php echo $basePath; ?>admin-login.php">Admin Login</a>
                <a class="btn btn-sm btn-outline-primary" href="<?php echo $basePath; ?>staff-login.php">Staff Login</a>
                <a class="btn btn-sm btn-outline-primary" href="<?php echo $basePath; ?>student-login.php">Student Login</a>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="<?php echo $basePath; ?>index.php">
                <span class="logo-circle">ITI</span>
                <div>
                    <div class="fw-bold">Industrial Training Institute</div>
                    <small class="text-muted">Skilling India for tomorrow</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link <?php echo nav_active('index.php', $current); ?>" href="<?php echo $basePath; ?>index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo nav_active('about.php', $current); ?>" href="<?php echo $basePath; ?>about.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo nav_active('courses.php', $current); ?>" href="<?php echo $basePath; ?>courses.php">Courses</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo nav_active('admission.php', $current); ?>" href="<?php echo $basePath; ?>admission.php">Admission</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo nav_active('faculty.php', $current); ?>" href="<?php echo $basePath; ?>faculty.php">Faculty</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo nav_active('academics.php', $current); ?>" href="<?php echo $basePath; ?>academics.php">Academics</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo nav_active('facilities.php', $current); ?>" href="<?php echo $basePath; ?>facilities.php">Facilities</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo nav_active('events.php', $current); ?>" href="<?php echo $basePath; ?>events.php">Events</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo nav_active('gallery.php', $current); ?>" href="<?php echo $basePath; ?>gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo nav_active('placement.php', $current); ?>" href="<?php echo $basePath; ?>placement.php">Placement</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo nav_active('contact.php', $current); ?>" href="<?php echo $basePath; ?>contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
