<?php

use App\Controllers\AddsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AddsController();
echo $controller->updateAdd();
?>


<p>Mise à jour d'une annonce</p>
<form method="post" action="adds_update.php" name ="addUpdateForm">
    <label for="id">Numéro de l'annonce à modifier <em>Id</em> :</label>
    <input type="text" name="id">
    <br />
    <label for="driverId">Numéro du conducteur <em>(Id)</em> :</label>
    <input type="text" name="driverId">
    <br />
    <label for="carId">Numéro de la voiture <em>(Id)</em> :</label>
    <input type="text" name="carId">
    <br />
    <label for="tripDateAndTime">Date et heure du voyage :</label>
    <input type="datetime-local" name="tripDateAndTime">
    <br />
    <label for="tripDepartureCity">Ville de départ :</label>
    <input type="text" name="tripDepartureCity">
    <br />
    <label for="tripArrivalCity">Ville d'arrivée :</label>
    <input type="text" name="tripArrivalCity">
    <br />
    <input type="submit" value="Mettre à jour l'annonce">
</form>