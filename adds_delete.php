<?php

use App\Controllers\AddsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AddsController();
echo $controller->deleteAdd();
?>

<p>Supression d'une annonce</p>
<form method="post" action="add_delete.php" name ="addDeleteForm">
    <label for="id">Numéro de l'annonce <em>(Id)</em> :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une annonce">
</form>