<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->createCar();
?>
<link rel="stylesheet" href="css/form.css" type="text/css" />
<p>Ajout d'un véhicule (voiture)</p>
<form method="post" action="cars_create.php" name ="carCreateForm">
    <label for="carmodel">Modèle :</label>
    <input type="text" name="carmodel">
    <br />
    <label for="color">Couleur :</label>
    <input type="text" name="color">
    <br />
    <label for="capacity">Capacité (nombre de siège hors conducteur) :</label>
    <input type="text" name="capacity">
    <br />
    <label for="driver">Conducteur :</label>
    <input type="text" name="driver">
    <br />
    <input type="submit" value="Ajout d'une voiture">
</form>