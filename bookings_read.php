<?php

use App\Controllers\BookingsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new BookingsController();
echo $controller->getBookings();
?>
<link rel="stylesheet" href="css/form.css" type="text/css" />