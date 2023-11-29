<?php

use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$controller = new UsersController();
echo $controller->deleteUser();
?>
<link rel="stylesheet" href="css/form.css" type="text/css" />
<p>Supression d'un utilisateur</p>
<form method="post" action="users_delete.php" name ="userDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer un utilisateur">
</form>