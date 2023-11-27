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
}
