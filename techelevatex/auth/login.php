<?php
require __DIR__ . '/../includes/init.php';
$pageTitle = 'Login';
$errors = [];
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Invalid session token.';
    }

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?: '';
    $password = $_POST['password'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email required.';
    }
    if (trim($password) === '') {
        $errors[] = 'Password required.';
    }

    if (!$errors) {
        $stmt = $db->prepare('SELECT id, password FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password'])) {
            $errors[] = 'Invalid credentials.';
        } else {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /techelevatex/user/dashboard.php');
            exit;
        }
    }
}

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav.php';
?>
<section class="auth-section">
  <div class="container auth-card">
    <h1>Welcome back</h1>
    <p>Access your Techelevatex dashboard.</p>

    <?php if ($errors) : ?>
      <div class="alert">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form method="post" action="/techelevatex/auth/login.php">
      <input type="hidden" name="csrf_token" value="<?php echo e(generate_csrf_token()); ?>" />
      <label>
        Email
        <input type="email" name="email" value="<?php echo e($email); ?>" required />
      </label>
      <label>
        Password
        <input type="password" name="password" required />
      </label>
      <button class="btn primary" type="submit">Login</button>
    </form>
    <p class="muted">Need an account? <a href="/techelevatex/auth/register.php">Create one</a>.</p>
  </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
