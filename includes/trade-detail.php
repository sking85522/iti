<?php
if (!isset($trade)) {
    $trade = [
        'name' => 'Trade',
        'duration' => '1 Year',
        'seats' => '40',
        'eligibility' => '10th pass',
        'syllabus' => 'Core modules, practical sessions, and safety training.',
        'career' => 'Technician roles in manufacturing and services.',
    ];
}
?>
<section class="container my-5">
    <h1 class="section-title"><?php echo htmlspecialchars($trade['name']); ?></h1>
    <div class="row g-4 mt-3">
        <div class="col-lg-7">
            <div class="info-card p-4">
                <h3>Trade Details</h3>
                <ul class="small">
                    <li><strong>Duration:</strong> <?php echo htmlspecialchars($trade['duration']); ?></li>
                    <li><strong>Seats:</strong> <?php echo htmlspecialchars($trade['seats']); ?></li>
                    <li><strong>Eligibility:</strong> <?php echo htmlspecialchars($trade['eligibility']); ?></li>
                </ul>
                <h4 class="mt-4">Syllabus Highlights</h4>
                <p class="small"><?php echo htmlspecialchars($trade['syllabus']); ?></p>
                <h4 class="mt-4">Career Scope</h4>
                <p class="small"><?php echo htmlspecialchars($trade['career']); ?></p>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="info-card p-4 h-100">
                <h3>Admission Info</h3>
                <ul class="small">
                    <li>Apply Online/Offline as per schedule.</li>
                    <li>Document verification and counseling.</li>
                    <li>Merit-based seat allotment.</li>
                </ul>
                <a class="btn btn-outline-success" href="/admission.php">Admission Details</a>
            </div>
        </div>
    </div>
</section>
