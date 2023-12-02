<?php

use App\Controllers\AddsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AddsController();
echo '<main>
        <table>
            <thead>
            <tr>
                <th>Numéro</th>
                <th>Conducteur</th>
                <th>Voiture</th>
                <th>Places</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Depart</th>
                <th>Arrivée</th>
            </tr>
            </thead>
            <tbody>';
                echo $controller->getAdds();
            echo '
            </tbody>
        </table>
    </main>';

?>
<link rel="stylesheet" href="css/form.css" type="text/css" />