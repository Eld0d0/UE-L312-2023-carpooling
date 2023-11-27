<?php

namespace App\Services;

use App\Entities\Advert;
use DateTime;

class AdvertsService
{

    public function setAdvert(?string $id, string $id_driver, string $id_car, string $city_start, string $city_end, string $advert_date): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $advertDateTime = new DateTime($advert_date);
        if (empty($id)) {
            $isOk = $dataBaseService->createAdvert($id_driver, $id_car, $city_start, $city_end, $advertDateTime);
        } else {
            $isOk = $dataBaseService->updateAdvert($id, $id_driver, $id_car, $city_start, $city_end, $advertDateTime);
        }

        return $isOk;
    }

    /**
     * Return all adverts.
     */
    public function getAdverts(): array
    {
        $adverts = [];

        $dataBaseService = new DataBaseService();
        $advertsDTO = $dataBaseService->getAdverts();
        if (!empty($advertsDTO)) {
            foreach ($advertsDTO as $advertDTO) {
                $advert = new Advert();
                $advert->setId($advertDTO['id']);
                $advert->setIdDriver($advertDTO['iddriver']);
                $advert->setIdCar($advertDTO['idcar']);
                $advert->setCityStart($advertDTO['citystart']);
                $advert->setCityEnd($advertDTO['cityend']);
                $date = new DateTime($advertDTO['advertdate']);
                if ($date !== false) {
                    $advert->setAdvertDate($date);
                }
                $adverts[] = $advert;
            }
        }

        return $adverts;
    }

    /**
     * Delete an advert.
     */
    public function deleteAdvert(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAdvert($id);

        return $isOk;
    }
}
