<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo '<main>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Modèle</th>
                <th>Couleur</th>
                <th>Nombre de place</th>
            </tr>
            </thead>
            <tbody>';
                echo $controller->getCars();
            echo '
            </tbody>
        </table>
    </main>';

?>
<link rel="stylesheet" href="css/form.css" type="text/css" />