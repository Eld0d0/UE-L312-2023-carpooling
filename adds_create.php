<?php

use App\Controllers\AddsController;

// if(isset($_POST['tripDateAndTime'])){
//     echo '<pre>';
//     var_dump($_POST['tripDateAndTime']);
//     echo '</pre>';
//     die;
// }

require __DIR__ . '/vendor/autoload.php';

$controller = new AddsController();
echo $controller->createAdd();
?>

<p>Création d'une annonce</p>
<form method="post" action="adds_create.php" name ="addCreateForm">
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
    <input type="submit" value="Créer une annonce">
</form>