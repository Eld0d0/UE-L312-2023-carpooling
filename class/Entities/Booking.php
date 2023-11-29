<?php

namespace App\Entities;


class Booking
{
    private $id;            //Booking ID
    private $addId;         //ID of the add being booked
    private $passengerId;   //User ID of the person booking the trip

    /* Booking ID getter && setter */
    public function getId(): string
    {
        return $this->id;
    }
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /* Add ID getter && setter */
    public function getaddId(): string
    {
        return $this->firstname;
    }
    public function setaddId(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /* Passenger ID getter && setter */
    public function getPassengerId(): string
    {
        return $this->lastname;
    }
    public function setPassengerId(string $lastname): void
    {
        $this->lastname = $lastname;
    }
}
