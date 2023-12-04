<?php

namespace App\Entities;

use DateTime;

class User
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $birthday;
    private $cars;  
    private $adds;
    private $bookings;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }
    public function getCars(): ?array
    {
        return $this->cars;
    }

    public function setCars(array $cars)
    {
        $this->cars = $cars;
        
        return $this;
    }
    public function getAdds(): ?array
    {
        return $this->adds;
    }

    public function setAdds(array $adds)
    {
        $this->adds = $adds;

        return $this;
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
