<?php

use App\Controllers\AddsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AddsController();
echo '<main>';
echo $controller->getAdds();
echo '</main>';

?>
<link rel="stylesheet" href="css/form.css" type="text/css" />