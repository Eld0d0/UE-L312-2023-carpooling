<?php

use App\Controllers\AdvertsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdvertsController();
echo $controller->deleteAdvert();
?>

<p>Supression d'une annonce</p>
<form method="post" action="adverts_delete.php" name ="advertDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une annonce">
</form>