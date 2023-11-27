<?php

use App\Controllers\BookingsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new BookingsController();
echo $controller->deleteBooking();
?>

<p>Supression d'une réservation</p>
<form method="post" action="bookings_delete.php" name ="bookingDeleteForm">
    <label for="id">Numéro de la réservation a supprimer <em>(Id de la réservation)</em> :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une reservation">
</form>