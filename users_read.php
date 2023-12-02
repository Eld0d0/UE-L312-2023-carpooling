<?php

use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$controller = new UsersController();
echo '<main>';
echo $controller->getUsers();
echo '</main>';

?>
<link rel="stylesheet" href="css/form.css" type="text/css" />