<?php
require __DIR__ . '/../includes/init.php';
require_role($currentUser, 'worker');
$pageTitle = 'Worker Panel';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Invalid session token.';
    }

    $assignedTasks = trim($_POST['assigned_tasks'] ?? '');
    if ($assignedTasks === '') {
        $errors[] = 'Task update required.';
    }

    if (!$errors) {
        $stmt = $db->prepare('UPDATE workers SET assigned_tasks = ? WHERE user_id = ?');
        $stmt->execute([$assignedTasks, $currentUser['id']]);
        header('Location: /techelevatex/worker/dashboard.php');
        exit;
    }
}

$stmt = $db->prepare('SELECT assigned_tasks, status FROM workers WHERE user_id = ?');
$stmt->execute([$currentUser['id']]);
$assignment = $stmt->fetch() ?: [];

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav.php';
?>
<section class="dashboard">
  <div class="container">
    <h1>Worker Panel</h1>
    <p>Update your assigned tasks.</p>

    <?php if ($errors) : ?>
      <div class="alert">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="panel">
      <h3>Assigned Tasks</h3>
      <form method="post" action="/techelevatex/worker/dashboard.php">
        <input type="hidden" name="csrf_token" value="<?php echo e(generate_csrf_token()); ?>" />
        <textarea name="assigned_tasks" rows="5"><?php echo e($assignment['assigned_tasks'] ?? ''); ?></textarea>
        <button class="btn primary" type="submit">Update Tasks</button>
      </form>
      <p>Status: <strong><?php echo e($assignment['status'] ?? 'Pending'); ?></strong></p>
    </div>
  </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
