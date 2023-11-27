<?php

use App\Controllers\AdvertsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdvertsController();
echo $controller->getAdverts();
