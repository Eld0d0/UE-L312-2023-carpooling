<?php

namespace App\Services;

use App\Entities\Add;
use DateTime;

class AddsService
{
    /**
     * Create or update an add.
     */
    public function setAdd(?string $id, string $driverId, string $carId, DateTime $tripDate, DateTime $tripDepartureTime, string $tripDepartureCity, string $tripArrivalCity): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createAdd($driverId, $carId, $tripDate, $tripDepartureTime, $tripDepartureCity, $tripArrivalCity);
        } else {
            $isOk = $dataBaseService->updateAdd($id, $driverId, $carId, $tripDate, $tripDepartureTime, $tripDepartureCity, $tripArrivalCity);
        }

        return $isOk;
    }

    /**
     * Return all adds.
     */
    public function getAdds(): array
    {
        $adds = [];

        $dataBaseService = new DataBaseService();
        $addsDTO = $dataBaseService->getAdds();
        if (!empty($addsDTO)) {
            foreach ($addsDTO as $addDTO) {
                $add = new Add();
                $add->setId($addDTO['id']);
                $add->setDriverId($addDTO['driverId']);
                $add->setCarId($addDTO['carId']);
                $add->setTripDepartureCity($addDTO['tripDepartureCity']);
                $add->setTripArrivalCity($addDTO['tripArrivalCity']);
                $tripDate = new DateTime($addDTO['tripDate']);
                if ($tripDate !== false) {
                    $add->setTripDate($tripDate);
                }
                $tripDepartureHour = new DateTime($addDTO['tripDepartureTime']);
                if ($tripDepartureHour !== false) {
                    $add->setTripDepartureTime($tripDepartureHour);
                }
                $adds[] = $add;
            }
        }

        return $adds;
    }

    /**
     * Delete an add.
     */
    public function deleteAdd(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAdd($id);

        return $isOk;
    }
}
