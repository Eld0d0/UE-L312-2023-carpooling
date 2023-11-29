<?php

use App\Controllers\AddsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AddsController();
echo $controller->getAdds();
?>
<link rel="stylesheet" href="css/form.css" type="text/css" />