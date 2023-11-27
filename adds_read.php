<?php

use App\Controllers\AddsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AddsController();
echo $controller->getAdds();
