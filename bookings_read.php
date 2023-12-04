<?php

use App\Controllers\BookingsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new BookingsController();

echo '<main>
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Annonce</th>
                <th>Passager</th>
            </tr>
            </thead>
            <tbody>';
                echo $controller->getBookings();
            echo '
            </tbody>
        </table>
    </main>';

?>
<link rel="stylesheet" href="css/form.css" type="text/css" />