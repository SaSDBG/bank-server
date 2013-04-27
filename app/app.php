<?php

$app = new Silex\Application();

require_once 'config.php';
require_once 'services.php';

require_once 'controlers.php';

return $app;

?>
