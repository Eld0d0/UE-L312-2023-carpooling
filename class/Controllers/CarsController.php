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
            isset($_POST['capacity']) &&
            isset($_POST['driver'])) {
            
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                null,
                $_POST['carmodel'],
                $_POST['color'],
                $_POST['capacity'],
                $_POST['driver']
            );
            if ($isOk) {
                $html = 'Voiture ajoutée à l\'utilisateur avec succès';
            } else {
                $html = 'Erreur lors de l\'ajout à l\'utilisateur.';
            }
        }

        return $html;
    }


    public function getCars(): string
    {
        $html = '';

        $carsService = new CarsService();
        $cars = $carsService->getCars();

        // Get html :
        foreach ($cars as $car) {
            $html .=
                '#' . $car->getId() . ' ' .
                $car->getCarModel() . ' ' .
                $car->getColor() . ' ' .
                $car->getCapacity() . ' ' .
                $car->getDriver() . '<br />';
        }

        return $html;
    }

    public function updateCar(): string
    {
        $html = '';

        if (isset($_POST['id']) &&
            isset($_POST['carmodel']) &&
            isset($_POST['color']) &&
            isset($_POST['capacity']) &&
            isset($_POST['driver'])) {

            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                $_POST['id'],
                $_POST['carmodel'],
                $_POST['color'],
                $_POST['capacity'],
                $_POST['driver']
            );
            if ($isOk) {
                $html = 'Voiture mis à jour avec succès.';
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
