<?php

namespace App\Entities;

use DateTime;

class Add
{
    private $id;                    //Add identification number
    private $driverId;              //Driver identification number
    private $carId;                 //Car identification number
    private $tripDate;              //Trip departure date
    private $tripDepartureTime;     //Trip departure time
    private $tripDepartureCity;     //Trip departure city
    private $tripArrivalCity;       //Trip arrival city



    /* Add ID getter && setter */
    public function getId(): string
    {
        return $this->id;
    }
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    
    /* Driver ID getter && setter */
    public function getDriverId(): string
    {
        return $this->driverId;
    }
    public function setDriverId(string $driverId): void
    {
        $this->driverId = $driverId;
    }
 
    
    /* Car ID getter && setter */
    public function getCarId(): string
    {
        return $this->carId;
    }
    public function setCarId(string $carId): void
    {
        $this->carId = $carId;
    }


    
    /* Trip departure date getter && setter*/
    public function getTripDate(): DateTime
    {
        return $this->tripDate;
    }
    public function setTripDate(DateTime $tripDate): void
    {
        $this->tripDate = $tripDate;
    }

   
    /* Trip departure time getter && setter */
    public function getTripDepartureTime(): DateTime
    {
        return $this->tripDepartureTime;
    }
    public function setTripDepartureTime(DateTime $tripDepartureTime): void
    {
        $this->tripDepartureTime = $tripDepartureTime;
    }

    
    /* Trip departure city getter && setter */
    public function getTripDepartureCity(): string
    {
        return $this->tripDepartureCity;
    }
    public function setTripDepartureCity(string $tripDepartureCity): void
    {
        $this->tripDepartureCity = $tripDepartureCity;
    }


    
    /* Trip arrival city getter && setter */
    public function getTripArrivalCity(): string
    {
        return $this->tripArrivalCity;
    }
    public function setTripArrivalCity(string $tripArrivalCity): void
    {
        $this->tripArrivalCity = $tripArrivalCity;
    }

}
