<?php
require __DIR__ . '/../includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf_token($_POST['csrf_token'] ?? '')) {
    session_destroy();
}

header('Location: /techelevatex/index.php');
exit;
