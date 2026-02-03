<?php
require __DIR__ . '/../includes/init.php';
require_role($currentUser, 'admin');
$pageTitle = 'Manage Workers';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Invalid session token.';
    }

    if (isset($_POST['delete_id'])) {
        if (!$errors) {
            $deleteId = (int)$_POST['delete_id'];
            $stmt = $db->prepare('DELETE FROM workers WHERE id = ?');
            $stmt->execute([$deleteId]);
            $log = $db->prepare('INSERT INTO admin_logs (admin_id, action) VALUES (?, ?)');
            $log->execute([$currentUser['id'], 'Deleted worker ID ' . $deleteId]);
            header('Location: /techelevatex/admin/workers.php');
            exit;
        }
    } else {
        $userId = (int)($_POST['user_id'] ?? 0);
        $workerId = trim($_POST['worker_id'] ?? '');
        $assignedTasks = trim($_POST['assigned_tasks'] ?? '');
        $status = trim($_POST['status'] ?? 'active');

        if ($userId <= 0) {
            $errors[] = 'User required.';
        }
        if ($workerId === '') {
            $errors[] = 'Worker ID required.';
        }

        if (!$errors) {
            $stmt = $db->prepare('INSERT INTO workers (user_id, worker_id, assigned_tasks, status) VALUES (?, ?, ?, ?)');
            $stmt->execute([$userId, $workerId, $assignedTasks, $status]);
            $log = $db->prepare('INSERT INTO admin_logs (admin_id, action) VALUES (?, ?)');
            $log->execute([$currentUser['id'], 'Created worker ' . $workerId]);
            header('Location: /techelevatex/admin/workers.php');
            exit;
        }
    }
}

$workers = $db->query('SELECT workers.id, workers.worker_id, workers.status, users.name AS user_name FROM workers JOIN users ON workers.user_id = users.id')->fetchAll();

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav.php';
?>
<section class="section">
  <div class="container">
    <h1>Manage Workers</h1>
    <?php if ($errors) : ?>
      <div class="alert">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form class="form-card" method="post" action="/techelevatex/admin/workers.php">
      <input type="hidden" name="csrf_token" value="<?php echo e(generate_csrf_token()); ?>" />
      <h3>Create Worker Assignment</h3>
      <label>
        User ID
        <input type="number" name="user_id" required />
      </label>
      <label>
        Worker ID
        <input type="text" name="worker_id" required />
      </label>
      <label>
        Assigned Tasks
        <input type="text" name="assigned_tasks" placeholder="Exam panel update" />
      </label>
      <label>
        Status
        <select name="status">
          <option value="active">Active</option>
          <option value="on-hold">On-hold</option>
          <option value="completed">Completed</option>
        </select>
      </label>
      <button class="btn primary" type="submit">Assign</button>
    </form>

    <div class="table">
      <div class="table-row header">
        <span>Worker ID</span>
        <span>User</span>
        <span>Status</span>
        <span>Actions</span>
      </div>
      <?php foreach ($workers as $worker) : ?>
        <div class="table-row">
          <span><?php echo e($worker['worker_id']); ?></span>
          <span><?php echo e($worker['user_name']); ?></span>
          <span><?php echo e($worker['status']); ?></span>
          <span>
            <form method="post" action="/techelevatex/admin/workers.php">
              <input type="hidden" name="csrf_token" value="<?php echo e(generate_csrf_token()); ?>" />
              <input type="hidden" name="delete_id" value="<?php echo e((string)$worker['id']); ?>" />
              <button class="link-button" type="submit">Delete</button>
            </form>
          </span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
