<?php

namespace App\Services;

use App\Entities\Car;
use DateTime;

class CarsService
{

    public function setCar(?string $id, string $carmodel, string $color, string $capacity, string $driver): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createCar($carmodel, $color, $capacity, $driver);
        } else {
            $isOk = $dataBaseService->updateCar($id, $carmodel, $color, $capacity, $driver);
        }

        return $isOk;
    }

    public function getCars(): array
    {
        $cars = [];

        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getCars();
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setCarModel($carDTO['carmodel']);
                $car->setColor($carDTO['color']);
                $car->setCapacity($carDTO['capacity']);
                $car->setDriver($carDTO['driver']);

                $cars[] = $car;
            }
        }

        return $cars;
    }

    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCar($id);

        return $isOk;
    }
}
