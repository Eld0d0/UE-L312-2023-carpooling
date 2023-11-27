<?php

namespace App\Controllers;

use App\Services\AddsService;

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
            $isOk = $addsService->setAdd(
                null,
                $_POST['driverId'],
                $_POST['carId'],
                strtotime($_POST['tripDateAndTime']),
                $_POST['tripDepartureCity'],
                $_POST['tripArrivalCity']
            );
            if ($isOk) {
                $html = 'L\'annonce a été créée avec succès.';
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

        // Get all adds :
        $addsService = new AddsService();
        $adds = $addsService->getAdds();

        // Get html :
        foreach ($adds as $add) {
            $html .=
                '#' . $add->getId() . ' ' .
                $add->getDriverId() . ' ' .
                $add->getCarId() . ' ' .
                $add->getTripDateAndTime()->format('d-m-Y') . ' '.
                $add->getTripDateAndTime()->format('h-m') . ' '.
                $add->getTripDepartureCity() . ' '.
                $add->getTripArrivalCity() . '<br />';
        }

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
            $isOk = $addsService->setAdd(
                $_POST['id'],
                $_POST['driverId'],
                $_POST['carId'],
                strtotime($_POST['tripDateAndTime']),
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
