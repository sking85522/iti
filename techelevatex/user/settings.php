<?php
require __DIR__ . '/../includes/init.php';
require_auth($currentUser);
$pageTitle = 'Settings';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Invalid session token.';
    }

    $language = strtolower(trim($_POST['language'] ?? ''));
    if ($language === '') {
        $errors[] = 'Language required.';
    }

    if (!$errors) {
        $stmt = $db->prepare('UPDATE users SET language = ? WHERE id = ?');
        $stmt->execute([$language, $currentUser['id']]);
        header('Location: /techelevatex/user/settings.php');
        exit;
    }
}

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav.php';
?>
<section class="section">
  <div class="container form-card">
    <h1>Settings</h1>
    <p>Manage language preferences and dashboard personalization.</p>

    <?php if ($errors) : ?>
      <div class="alert">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form method="post" action="/techelevatex/user/settings.php">
      <input type="hidden" name="csrf_token" value="<?php echo e(generate_csrf_token()); ?>" />
      <label>
        Language
        <select name="language">
          <option value="en" <?php echo ($currentUser['language'] ?? 'en') === 'en' ? 'selected' : ''; ?>>English</option>
          <option value="hi" <?php echo ($currentUser['language'] ?? '') === 'hi' ? 'selected' : ''; ?>>Hindi</option>
        </select>
      </label>
      <button class="btn primary" type="submit">Save Preferences</button>
    </form>
  </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
