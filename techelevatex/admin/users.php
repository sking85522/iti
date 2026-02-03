<?php
require __DIR__ . '/../includes/init.php';
require_role($currentUser, 'admin');
$pageTitle = 'Manage Users';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Invalid session token.';
    }

    if (isset($_POST['delete_id'])) {
        if (!$errors) {
            $deleteId = (int)$_POST['delete_id'];
            $stmt = $db->prepare('DELETE FROM users WHERE id = ?');
            $stmt->execute([$deleteId]);
            $log = $db->prepare('INSERT INTO admin_logs (admin_id, action) VALUES (?, ?)');
            $log->execute([$currentUser['id'], 'Deleted user ID ' . $deleteId]);
            header('Location: /techelevatex/admin/users.php');
            exit;
        }
    } else {
        $uid = trim($_POST['uid'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?: '';
        $role = trim($_POST['role'] ?? 'user');
        $password = $_POST['password'] ?? '';

        if ($name === '') {
            $errors[] = 'Name required.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Valid email required.';
        }
        if (strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters.';
        }
        if (!in_array($role, ['admin', 'worker', 'user'], true)) {
            $errors[] = 'Role required.';
        }

        if (!$errors) {
            $uid = $uid !== '' ? $uid : 'TX-' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $db->prepare('INSERT INTO users (uid, name, email, password, role, language) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$uid, $name, $email, $hash, $role, 'en']);
            $log = $db->prepare('INSERT INTO admin_logs (admin_id, action) VALUES (?, ?)');
            $log->execute([$currentUser['id'], 'Created user ' . $email]);
            header('Location: /techelevatex/admin/users.php');
            exit;
        }
    }
}

$users = $db->query('SELECT id, uid, name, email, role, language FROM users')->fetchAll();

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav.php';
?>
<section class="section">
  <div class="container">
    <h1>Manage Users</h1>
    <?php if ($errors) : ?>
      <div class="alert">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form class="form-card" method="post" action="/techelevatex/admin/users.php">
      <input type="hidden" name="csrf_token" value="<?php echo e(generate_csrf_token()); ?>" />
      <h3>Create User</h3>
      <label>
        UID (optional)
        <input type="text" name="uid" placeholder="Auto-generated if blank" />
      </label>
      <label>
        Name
        <input type="text" name="name" required />
      </label>
      <label>
        Email
        <input type="email" name="email" required />
      </label>
      <label>
        Password
        <input type="password" name="password" required />
      </label>
      <label>
        Role
        <select name="role">
          <option value="user">User</option>
          <option value="worker">Worker</option>
          <option value="admin">Admin</option>
        </select>
      </label>
      <button class="btn primary" type="submit">Create</button>
    </form>

    <div class="table">
      <div class="table-row header">
        <span>UID</span>
        <span>Name</span>
        <span>Email</span>
        <span>Role</span>
        <span>Language</span>
        <span>Actions</span>
      </div>
      <?php foreach ($users as $user) : ?>
        <div class="table-row">
          <span><?php echo e($user['uid']); ?></span>
          <span><?php echo e($user['name']); ?></span>
          <span><?php echo e($user['email']); ?></span>
          <span><?php echo e($user['role']); ?></span>
          <span><?php echo e($user['language']); ?></span>
          <span>
            <form method="post" action="/techelevatex/admin/users.php">
              <input type="hidden" name="csrf_token" value="<?php echo e(generate_csrf_token()); ?>" />
              <input type="hidden" name="delete_id" value="<?php echo e((string)$user['id']); ?>" />
              <button class="link-button" type="submit">Delete</button>
            </form>
          </span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
