<?php
require __DIR__ . '/../includes/init.php';
require_role($currentUser, 'admin');
$pageTitle = 'Admin Panel';

$userCount = $db->query('SELECT COUNT(*) AS count FROM users')->fetch();
$workerCount = $db->query('SELECT COUNT(*) AS count FROM workers')->fetch();
$logs = $db->query('SELECT id, action, created_at FROM admin_logs ORDER BY created_at DESC LIMIT 5')->fetchAll();

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav.php';
?>
<section class="dashboard">
  <div class="container">
    <h1>Admin Panel</h1>
    <p>Manage users, workers, and site settings.</p>

    <div class="dashboard-grid">
      <div class="panel">
        <h3>Total Users</h3>
        <p class="stat"><?php echo e((string)($userCount['count'] ?? 0)); ?></p>
        <a href="/techelevatex/admin/users.php">Manage Users</a>
      </div>
      <div class="panel">
        <h3>Total Workers</h3>
        <p class="stat"><?php echo e((string)($workerCount['count'] ?? 0)); ?></p>
        <a href="/techelevatex/admin/workers.php">Manage Workers</a>
      </div>
      <div class="panel">
        <h3>Recent Logs</h3>
        <ul>
          <?php foreach ($logs as $log) : ?>
            <li><?php echo e($log['action']); ?> (<?php echo e(date('Y-m-d', strtotime($log['created_at']))); ?>)</li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
