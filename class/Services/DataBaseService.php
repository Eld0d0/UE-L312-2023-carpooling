<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'carpooling';
    const MYSQL_PASSWORD = 'jesuisunmotdepassepasfiable';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    #####################################
    ############## USERS ################
    #####################################

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    #####################################
    ############### CARS ################
    #####################################


    /**
     * Create a car.
     */
    public function createCar(string $carmodel, string $color, string $capacity): bool
    {
        $isOk = false;

        $data = [
            'carmodel' => $carmodel,
            'color' => $color,
            'capacity' => $capacity,
        ];
        $sql = 'INSERT INTO cars (carmodel, color, capacity) VALUES (:carmodel, :color, :capacity)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    /**
     * Update a car.
     */
    public function updateCar(string $id, string $carmodel, string $color, string $capacity): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'carmodel' => $carmodel,
            'color' => $color,
            'capacity' => $capacity,
        ];
        $sql = 'UPDATE cars SET carmodel = :carmodel, color = :color, capacity = :capacity WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM cars WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    #####################################
    ############ BOOKINGS ###############
    #####################################
     /**
     * Create a booking.
     */
    public function createBooking(string $addId, string $passengerId): bool
    {
        $isOk = false;

        $data = [
            'addId' => intval($addId),
            'passengerId' => intval($passengerId),
        ];
        $sql = 'INSERT INTO bookings (addId, passengerId) VALUES (:addId, :passengerId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all bookings.
     */
    public function getBookings(): array
    {
        $bookings = [];

        $sql = 'SELECT * FROM bookings';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $bookings = $results;
        }

        return $bookings;
    }

    /**
     * Update a booking.
     */
    public function updateBooking(string $id, string $addId, string $passengerId): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'addId' => intval($addId),
            'passengerId' => intval($passengerId),
        ];
        $sql = 'UPDATE bookings SET addId = :addId, passengerId = :passengerId WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    
    
    /**
     * Delete a booking.
     */
    public function deleteBooking(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => intval($id),
        ];
        $sql = 'DELETE FROM bookings WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
  
  /**
     * Create an add.
     */
    public function createAdd(string $driverId, string $carId, DateTime $tripDateAndTime, string $tripDepartureCity, string $tripArrivalCity): bool
    {
        $isOk = false;

        $data = [
            'driverId' => intval($driverId),
            'carId' => intval($carId),
            'tripDateAndTime' => $tripDateAndTime->format(DateTime::RFC3339),
            'tripDepartureCity' => $tripDepartureCity,
            'tripArrivalCity' => $tripArrivalCity,
        ];
        $sql = 'INSERT INTO adds (driverId, carId, tripDateAndTime, tripDepartureCity, tripArrivalCity) VALUES (:driverId, :carId, :tripDateAndTime, :tripDepartureCity, :tripArrivalCity)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Update an add.
     */
    public function updateAdd(string $id, string $driverId, string $carId, DateTime $tripDateAndTime, string $tripDepartureCity, string $tripArrivalCity): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'driverId' => intval($driverId),
            'carId' => intval($carId),
            'tripDateAndTime' => $tripDateAndTime->format(DateTime::RFC3339),
            'tripDepartureCity' => $tripDepartureCity,
            'tripArrivalCity' => $tripArrivalCity,
        ];
        $sql = 'UPDATE adds SET driverId = :driverId, carId = :carId, tripDateAndTime = :tripDateAndTime, tripDepartureCity = :tripDepartureCity, tripArrivalCity = :tripArrivalCity WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
    * Return all adds.
    */
    public function getAdds(): array
    {
        $adds = [];

        $sql = 'SELECT * FROM adds';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $adds = $results;
        }

        return $adds;
    }

    /**
     * Delete an add.
     */
    public function deleteAdd(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM adds WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }


    #####################################
    ############ RELATIONS ###############
    #####################################


    /**
     * Create relation bewteen an user and his car.
     */
    public function setUserCar(string $userId, string $carId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $userId,
            'carId' => $carId,
        ];
        $sql = 'INSERT INTO users_cars (user_id, car_id) VALUES (:userId, :carId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $userCars = [];

        $data = [
            'userId' => $userId,
        ];
        $sql = '
            SELECT c.*
            FROM cars as c
            LEFT JOIN users_cars as uc ON uc.car_id = c.id
            WHERE uc.user_id = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $userCars = $results;
        }

        return $userCars;
    }

    /**
     * Create relation bewteen an user and his add.
     */
    public function setUserAdd(string $userId, string $addId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $userId,
            'addId' => $addId,
        ];
        $sql = 'INSERT INTO users_adds (add_id, user_id) VALUES (:addId, :userId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserAdds(string $userId): array
    {
        $userAdds = [];

        $data = [
            'userId' => $userId,
        ];
        $sql = '
            SELECT a.*
            FROM adds as a
            LEFT JOIN users_adds as ua ON ua.add_id = a.id
            WHERE ua.user_id = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $userAdds = $results;
        }

        return $userAdds;
    }
}
