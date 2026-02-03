<?php
require __DIR__ . '/../includes/init.php';
$pageTitle = 'Register';
$errors = [];
$name = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Invalid session token.';
    }

    $name = trim($_POST['name'] ?? '');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?: '';
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

    if (!$errors) {
        $check = $db->prepare('SELECT id FROM users WHERE email = ?');
        $check->execute([$email]);
        if ($check->fetch()) {
            $errors[] = 'Email already registered.';
        } else {
            $uid = 'TX-' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $db->prepare('INSERT INTO users (uid, name, email, password, role, language) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$uid, $name, $email, $hash, 'user', 'en']);
            header('Location: /techelevatex/auth/login.php');
            exit;
        }
    }
}

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav.php';
?>
<section class="auth-section">
  <div class="container auth-card">
    <h1>Create your account</h1>
    <p>Register to access personalized dashboards and resources.</p>

    <?php if ($errors) : ?>
      <div class="alert">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form method="post" action="/techelevatex/auth/register.php">
      <input type="hidden" name="csrf_token" value="<?php echo e(generate_csrf_token()); ?>" />
      <label>
        Full Name
        <input type="text" name="name" value="<?php echo e($name); ?>" required />
      </label>
      <label>
        Email
        <input type="email" name="email" value="<?php echo e($email); ?>" required />
      </label>
      <label>
        Password
        <input type="password" name="password" required />
      </label>
      <button class="btn primary" type="submit">Register</button>
    </form>
    <p class="muted">Already registered? <a href="/techelevatex/auth/login.php">Login</a>.</p>
  </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
