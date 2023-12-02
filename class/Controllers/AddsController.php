<?php

namespace App\Controllers;

use App\Services\AddsService;
use DateTime;

class AddsController
{
    /**
     * Return the html for the create action.
     */
    public function createAdd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['driverId']) &&
            isset($_POST['carId']) &&
            isset($_POST['tripDateAndTime']) &&
            isset($_POST['tripDepartureCity']) &&
            isset($_POST['tripArrivalCity'])) {
            // Create the add :
            $addsService = new AddsService();
            $tripDateAndTime = new DateTime($_POST['tripDateAndTime']);
            $isOk = $addsService->setAdd(
                null,
                $_POST['driverId'],
                $_POST['carId'],
                $tripDateAndTime,
                $_POST['tripDepartureCity'],
                $_POST['tripArrivalCity']
            );
            if ($isOk) {
                $html = 'L\'annonce a été créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getAdds(): string
    {
        $html = '';
        $html = '
                <table>
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Conducteur</th>
                            <th>Voiture</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Depart</th>
                            <th>Arrivée</th>
                        </tr>
                    </thead>
                <tbody>';

        // Get all adds :
        $addsService = new AddsService();
        $adds = $addsService->getAdds();

        // Get html :
        foreach ($adds as $add) {
            $html .=
                '<tr>'.
                    '<td>' . $add->getId() . '</td>' .
                    '<td>' . $add->getDriverId()  . '</td>' .
                    '<td>' . $add->getCarId() . '</td>' .
                    '<td>' . $add->getTripDateAndTime()->format('d/mY') . '</td>' .
                    '<td>' . $add->getTripDateAndTime()->format('H:i') . '</td>' .
                    '<td>' . $add->getTripDepartureCity() . '</td>' .
                    '<td>' . $add->getTripArrivalCity()  . '</td>' .
                '</tr>';
        }

        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }

    /**
     * Update the add.
     */
    public function updateAdd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['driverId']) &&
            isset($_POST['carId']) &&
            isset($_POST['tripDateAndTime']) &&
            isset($_POST['tripDepartureCity']) &&
            isset($_POST['tripArrivalCity'])) {
            // Update the add :
            $addsService = new AddsService();
            $tripDateAndTime = new DateTime($_POST['tripDateAndTime']);
            $isOk = $addsService->setAdd(
                $_POST['id'],
                $_POST['driverId'],
                $_POST['carId'],
                $tripDateAndTime,
                $_POST['tripDepartureCity'],
                $_POST['tripArrivalCity']
            );
            if ($isOk) {
                $html = 'L\'annonce à été mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Delete an add.
     */
    public function deleteAdd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the add :
            $addsService = new AddsService();
            $isOk = $addsService->deleteAdd($_POST['id']);
            if ($isOk) {
                $html = 'L\'annonce a été supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce.';
            }
        }

        return $html;
    }
}
