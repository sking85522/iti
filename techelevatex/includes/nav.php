<header class="site-header">
  <div class="container nav-wrapper">
    <a class="logo" href="/techelevatex/index.php">Techelevatex</a>
    <nav>
      <a href="/techelevatex/about.php">About</a>
      <a href="/techelevatex/services.php">Services</a>
      <a href="/techelevatex/blog.php">Resources</a>
      <a href="/techelevatex/contact.php">Contact</a>
      <?php if (!empty($currentUser)) : ?>
        <a href="/techelevatex/user/dashboard.php">Dashboard</a>
        <form action="/techelevatex/auth/logout.php" method="post" class="inline-form">
          <input type="hidden" name="csrf_token" value="<?php echo e(generate_csrf_token()); ?>" />
          <button type="submit" class="link-button">Logout</button>
        </form>
      <?php else : ?>
        <a href="/techelevatex/auth/login.php">Login</a>
        <a href="/techelevatex/auth/register.php" class="btn">Get Started</a>
      <?php endif; ?>
    </nav>
  </div>
</header>
