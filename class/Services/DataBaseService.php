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

/* Partie Annonce */

public function createAdvert(string $id_driver, string $id_car, string $city_start, string $city_end, DateTime $advert_date): bool
    {
        $isOk = false;

        $data = [
            'iddriver' => $id_driver,
            'idcar' => $id_car,
            'citystart' => $city_start,
            'cityend' => $city_end,
            'advertdate' => $advert_date->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO adverts (iddriver, idcar, citystart, cityend, advertdate) VALUES (:iddriver, :idcar, :citystart, :cityend, :advertdate)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }


    public function getAdverts(): array
    {
        $adverts = [];

        $sql = 'SELECT * FROM adverts';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $adverts = $results;
        }

        return $adverts;
    }

    public function updateAdvert(string $id, string $id_driver, string $id_car, string $city_start, string $city_end, DateTime $advert_date): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'iddriver' => $id_driver,
            'idcar' => $id_car,
            'citystart' => $city_start,
            'cityend' => $city_end,
            'advertdate' => $advert_date->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE adverts SET iddriver = :iddriver, idcar = :idcar, citystart = :citystart, cityend = :cityend, advertdate = :advertdate WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    public function deleteAdvert(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM adverts WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

}
