<?php
  $tradeKey = basename(__FILE__, '.php');
  if ($tradeKey === 'mechanic-diesel') {
    $tradeKey = 'mechanic-diesel';
  }
  include __DIR__ . '/../includes/trade-data.php';
  include __DIR__ . '/../includes/trade-template.php';
?>
