<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCar();
?>

<p>Mise à jour d'un véhicule</p>
<form method="post" action="cars_update.php" name ="carUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="carmodel">Modèle :</label>
    <input type="text" name="carmodel">
    <br />
    <label for="color">Couleur :</label>
    <input type="text" name="color">
    <br />
    <label for="capacity">Capacité :</label>
    <input type="text" name="capacity">
    <br />
    <label for="driver">Conducteur :</label>
    <input type="text" name="driver">
    <br />
    <input type="submit" value="Modifier le véhicule">
</form>