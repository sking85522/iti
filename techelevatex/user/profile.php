<?php
require __DIR__ . '/../includes/init.php';
require_auth($currentUser);
$pageTitle = 'My Profile';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Invalid session token.';
    }

    $name = trim($_POST['name'] ?? '');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?: '';
    $photoUrl = filter_input(INPUT_POST, 'photo_url', FILTER_SANITIZE_URL) ?: '';

    if ($name === '') {
        $errors[] = 'Name required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email required.';
    }
    if ($photoUrl && !filter_var($photoUrl, FILTER_VALIDATE_URL)) {
        $errors[] = 'Photo URL must be valid.';
    }

    if (!$errors) {
        $stmt = $db->prepare('UPDATE users SET name = ?, email = ?, photo_url = ? WHERE id = ?');
        $stmt->execute([$name, $email, $photoUrl ?: null, $currentUser['id']]);
        header('Location: /techelevatex/user/profile.php');
        exit;
    }
}

$stmt = $db->prepare('SELECT uid, name, email, photo_url FROM users WHERE id = ?');
$stmt->execute([$currentUser['id']]);
$profile = $stmt->fetch();

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav.php';
?>
<section class="section">
  <div class="container form-card">
    <h1>Profile</h1>
    <p>Update your personal details.</p>

    <?php if ($errors) : ?>
      <div class="alert">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form method="post" action="/techelevatex/user/profile.php">
      <input type="hidden" name="csrf_token" value="<?php echo e(generate_csrf_token()); ?>" />
      <label>
        UID
        <input type="text" value="<?php echo e($profile['uid'] ?? ''); ?>" disabled />
      </label>
      <label>
        Name
        <input type="text" name="name" value="<?php echo e($profile['name'] ?? ''); ?>" required />
      </label>
      <label>
        Email
        <input type="email" name="email" value="<?php echo e($profile['email'] ?? ''); ?>" required />
      </label>
      <label>
        Photo URL
        <input type="url" name="photo_url" value="<?php echo e($profile['photo_url'] ?? ''); ?>" />
      </label>
      <button class="btn primary" type="submit">Save Changes</button>
    </form>
  </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
