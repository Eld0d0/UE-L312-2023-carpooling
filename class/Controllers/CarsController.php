<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    
    public function createCar(): string
    {
        $html = '';

        if (isset($_POST['carmodel']) &&
            isset($_POST['color']) &&
            isset($_POST['capacity'])) {
            
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                null,
                $_POST['carmodel'],
                $_POST['color'],
                $_POST['capacity'],
            );
            if ($isOk) {
                $html = 'Voiture créée avec succès';
            } else {
                $html = 'Erreur lors de la création du véhicule.';
            }
        }

        return $html;
    }


    public function getCars(): string
    {
        $html = '';
		
        // Get all cars :
        $carsService = new CarsService();
        $cars = $carsService->getCars();

        // Get html :
        foreach ($cars as $car) {

            $html .=
                '<tr>'.
                    '<td>' . $car->getId() . '</td>' .
                    '<td>' . $car->getCarModel() . '</td>' .
                    '<td>' . $car->getColor() . '</td>' .
                    '<td>' . $car->getCapacity() . '</td>' .
                '</tr>';
        }

        return $html;
    }

    public function updateCar(): string
    {
        $html = '';

        if (isset($_POST['id']) &&
            isset($_POST['carmodel']) &&
            isset($_POST['color']) &&
            isset($_POST['capacity'])) {

            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                $_POST['id'],
                $_POST['carmodel'],
                $_POST['color'],
                $_POST['capacity']
            );
            if ($isOk) {
                $html = 'Propriété de la voiture mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour du véhicule.';
            }
        }

        return $html;
    }

    public function deleteCar(): string
    {
        $html = '';

        if (isset($_POST['id'])) {

            $carsService = new CarsService();
            $isOk = $carsService->deleteCar($_POST['id']);
            if ($isOk) {
                $html = 'Voiture supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression du véhicule.';
            }
        }

        return $html;
    }
}
