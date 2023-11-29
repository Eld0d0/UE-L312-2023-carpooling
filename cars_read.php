<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->getCars();
?>
<link rel="stylesheet" href="css/form.css" type="text/css" />