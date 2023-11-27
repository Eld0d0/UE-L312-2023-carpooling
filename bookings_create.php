<?php

use App\Controllers\BookingsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new BookingsController();
echo $controller->createBooking();
?>

<p>Création d'une reservation</p>
<form method="post" action="bookings_create.php" name ="bookingCreateForm">
    <label for="addId">Numéro de l'annonce <em>(Id de l'annonce)</em> :</label>
    <input type="text" name="addId">
    <br />
    <label for="passengerId">Numéro du passager <em>(Id utilisateur)</em> :</label>
    <input type="text" name="passengerId">
    <br />
    <input type="submit" value="Créer une réservation">
</form>