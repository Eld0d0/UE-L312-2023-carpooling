<?php

use App\Controllers\BookingsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new BookingsController();
echo '<main>';
echo $controller->getBookings();
echo '</main>';

?>
<link rel="stylesheet" href="css/form.css" type="text/css" />