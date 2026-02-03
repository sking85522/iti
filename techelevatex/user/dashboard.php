<?php
require __DIR__ . '/../includes/init.php';
require_auth($currentUser);
$pageTitle = 'User Dashboard';

$stmt = $db->query('SELECT id, title, summary FROM announcements ORDER BY created_at DESC LIMIT 3');
$announcements = $stmt->fetchAll();

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav.php';
?>
<section class="dashboard">
  <div class="container">
    <h1>Welcome, <?php echo e($currentUser['name'] ?? 'User'); ?></h1>
    <p>Your personalized Techelevatex dashboard.</p>

    <div class="dashboard-grid">
      <div class="panel">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="/techelevatex/user/profile.php">Edit Profile</a></li>
          <li><a href="/techelevatex/user/settings.php">Language Preferences</a></li>
          <li><a href="/techelevatex/blog.php">Hindi Resources</a></li>
        </ul>
      </div>
      <div class="panel">
        <h3>Latest Updates</h3>
        <?php if ($announcements) : ?>
          <ul>
            <?php foreach ($announcements as $item) : ?>
              <li><strong><?php echo e($item['title']); ?></strong> — <?php echo e($item['summary']); ?></li>
            <?php endforeach; ?>
          </ul>
        <?php else : ?>
          <p>No updates yet. Check back soon!</p>
        <?php endif; ?>
      </div>
      <div class="panel">
        <h3>Your Role</h3>
        <p><strong><?php echo e($currentUser['role']); ?></strong></p>
        <p>Access services tailored to your profile.</p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
