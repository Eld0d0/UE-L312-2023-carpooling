<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->deleteCar();
?>
<link rel="stylesheet" href="css/form.css" type="text/css" />
<p>Supression d'un véhicule (voiture)</p>
<form method="post" action="cars_delete.php" name ="carDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer un véhicule">
</form>