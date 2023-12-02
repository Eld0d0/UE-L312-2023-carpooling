<?php

namespace App\Services;

use App\Entities\User;
use App\Entities\Car;
use App\Entities\Add;
use DateTime;

class UsersService
{
    /**
     * Create or update an user.
     */
    public function setUser(?string $id, string $firstname, string $lastname, string $email, string $birthday): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $birthdayDateTime = new DateTime($birthday);
        if (empty($id)) {
            $isOk = $dataBaseService->createUser($firstname, $lastname, $email, $birthdayDateTime);
        } else {
            $isOk = $dataBaseService->updateUser($id, $firstname, $lastname, $email, $birthdayDateTime);
        }

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $dataBaseService = new DataBaseService();
        $usersDTO = $dataBaseService->getUsers();
        if (!empty($usersDTO)) {
            foreach ($usersDTO as $userDTO) {
                $user = new User();
                $user->setId($userDTO['id']);
                $user->setFirstname($userDTO['firstname']);
                $user->setLastname($userDTO['lastname']);
                $user->setEmail($userDTO['email']);
                $date = new DateTime($userDTO['birthday']);
                if ($date !== false) {
                    $user->setBirthday($date);
                }

                // Get cars of this user :
                $cars = $this->getUserCars($userDTO['id']);
                $user->setCars($cars);

                // Get adds of this user :
                $adds = $this->getUserAdds($userDTO['id']);
                $user->setAdds($adds);

                $users[] = $user;
            }
        }
        return $users;
    }


    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteUser($id);

        return $isOk;
    }


    /**
     * Create relation bewteen an user and his car.
     */
    public function setUserCar(string $userId, string $carId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setUserCar($userId, $carId);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $userCars = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $usersCarsDTO = $dataBaseService->getUserCars($userId);
        if (!empty($usersCarsDTO)) {
            foreach ($usersCarsDTO as $userCarDTO) {
                $car = new Car();
                $car->setId($userCarDTO['id']);
                $car->setCarModel($userCarDTO['carmodel']);
                $car->setColor($userCarDTO['color']);
                $car->setCapacity($userCarDTO['capacity']);
                $userCars[] = $car;
            }
        }

        return $userCars;
    }


    /**
     * Create relation bewteen an user and adds.
     */
    public function setUserAdd(string $userId, string $addId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setUserAdd($userId, $addId);

        return $isOk;
    }

    /**
     * Get adds of given user id.
     */
    public function getUserAdds(string $userId): array
    {
        $userAdds = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and adds :
        $usersAddsDTO = $dataBaseService->getUserAdds($userId);
        if (!empty($usersAddsDTO)) {
            foreach ($usersAddsDTO as $userAddDTO) {

                $date = new DateTime($userAddDTO['tripDateAndTime']);
                $add = new Add();
                $add->setId($userAddDTO['id']);
                $add->setDriverId($userAddDTO['driverId']);
                $add->setCarId($userAddDTO['carId']);
                $add->setTripDateAndTime($date);
                $add->setTripDepartureCity($userAddDTO['tripDepartureCity']);
                $add->setTripArrivalCity($userAddDTO['tripArrivalCity']);
                $userAdds[] = $add;
            }
        }
        return $userAdds;
    }
}
