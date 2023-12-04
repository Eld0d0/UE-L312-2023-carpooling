<?php

namespace App\Entities;

use DateTime;

class Add
{
    private $id;                    //Add identification number
    private $driverId;              //Driver identification number
    private $carId;                 //Car identification number
    private $tripDateAndTime;       //Trip departure date and time
    private $tripDepartureCity;     //Trip departure city
    private $tripArrivalCity;       //Trip arrival city
    private $bookings;


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
    public function getTripDateAndTime(): DateTime
    {
        return $this->tripDateAndTime;
    }
    public function setTripDateAndTime(DateTime $tripDateAndTime): void
    {
        $this->tripDateAndTime = $tripDateAndTime;
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

    public function getBookings(): ?array
    {
        return $this->bookings;
    }

    public function setBookings(array $bookings)
    {
        $this->bookings = $bookings;

        return $this;
    }

}
