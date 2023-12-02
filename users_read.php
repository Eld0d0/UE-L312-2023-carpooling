<?php

use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$controller = new UsersController();
echo '<main>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Voitures</th>
                <th>Annonces</th>
            </tr>
            </thead>
            <tbody>';
                echo $controller->getUsers();
            echo '
            </tbody>
        </table>
    </main>';

?>
<link rel="stylesheet" href="css/form.css" type="text/css" />