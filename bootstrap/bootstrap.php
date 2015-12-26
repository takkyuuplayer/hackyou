<?php
require_once ROOT_DIR . '/vendor/autoload.php';

$app = new \Hackyou\App(['settings' => [
  'displayErrorDetails' => true,
]]);

return $app;
