<?php

namespace App\Entities;

use DateTime;

class Car
{
    private $id;                // Numéro d'identification du véhicule
    private $carModel;          // Modèle de voiture
    private $color;             // Couleur du véhicule
    private $driver;         // Chauffeur de voiture pour le covoiturage
    private $capacity;          // Capacité en passagers des voitures

    public function getId(): string
    {
        return $this->id;
    }
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getCarModel(): string
    {
        return $this->carModel;
    }
    public function setCarModel(string $carModel): void
    {
        $this->carModel = $carModel;
    }


    public function getColor(): string
    {
        return $this->color;
    }
    public function setColor(string $color): void
    {
        $this->color = $color;
    }


    public function getDriver(): string
    {
        return $this->driver;
    }
    public function setDriver(string $driver): void
    {
        $this->driver = $driver;
    }


    public function getCapacity(): int
    {
        return $this->capacity;
    }
    public function setCapacity(int $capacity): void
    {
        $this->capacity = $capacity;
    }
}