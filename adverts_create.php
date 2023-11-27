<?php

use App\Controllers\AdvertsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdvertsController();
echo $controller->createAdvert();
?>

<p>Création d'une annonce</p>
<form method="post" action="adverts_create.php" name ="advertCreateForm">
    <label for="iddriver">Id du Conducteur :</label>
    <input type="text" name="iddriver">
    <br />
    <label for="idcar">Id de la voiture :</label>
    <input type="text" name="idcar">
    <br />
    <label for="citystart">Ville de départ :</label>
    <input type="text" name="citystart">
    <br />
    <label for="cityend">Ville d'arrivée :</label>
    <input type="text" name="cityend">
    <br />
    <label for="date">Date du trajet dd-mm-yyyy :</label>
    <input type="text" name="date">
    <br />
    <input type="submit" value="Créer une annonce">
</form>