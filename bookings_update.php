<?php

use App\Controllers\BookingsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new BookingsController();
echo $controller->updateBooking();
?>
<link rel="stylesheet" href="css/form.css" type="text/css" />
<p>Mise à jour d'une reservation</p>
<form method="post" action="bookings_update.php" name ="bookingCreateForm">
    <label for="id">Numéro de la réservation à modifier <em>(Id de la reservation)</em> :</label>
    <input type="text" name="id">
    <br />
    <label for="addId">Nouveau numéro de l'annonce <em>(Id de l'annonce)</em> :</label>
    <input type="text" name="addId">
    <br />
    <label for="passengerId">Nouveau numéro du passager <em>(Id utilisateur)</em> :</label>
    <input type="text" name="passengerId">
    <br />
    <input type="submit" value="Mettre à jour une réservation">
</form>