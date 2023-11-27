<?php

namespace App\Entities;

use DateTime;

class Advert
{
    private $id;
    private $id_driver;
    private $id_car;
    private $city_start;
    private $city_end;
    private $date;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getIdDriver(): string
    {
        return $this->id_driver;
    }

    public function setIdDriver(string $id_driver): void
    {
        $this->id_driver = $id_driver;
    }

    public function getIdCar(): string
    {
        return $this->id_car;
    }

    public function setIdCar(string $id_car): void
    {
        $this->id_car = $id_car;
    }

    public function getCityStart(): string
    {
        return $this->city_start;
    }

    public function setCityStart($city_start): void
    {
        $this->city_start = $city_start;
    }

    public function getCityEnd(): string
    {
        return $this->city_end;
    }

    public function setCityEnd($city_end): void
    {
        $this->city_end = $city_end;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }
}
