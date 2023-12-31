<?php

namespace App\Controllers;

use App\Services\UsersService;

class UsersController
{
    /**
     * Return the html for the create action.
     */
    public function createUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email']) &&
            isset($_POST['birthday'])&&
            isset($_POST['cars'])) {
            // Create the user :
            $usersService = new UsersService();
            $isOk = $usersService->setUser(
                null,
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
            );

            // Create the user cars relations :
            $isOk = true;
            if (!empty($_POST['cars'])) {
                foreach ($_POST['cars'] as $carId) {
                    $isOk = $usersService->setUserCar($userId, $carId);
                }
            }
            if ($userId && $isOk) {
                $html = 'Utilisateur créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'utilisateur.';
            }
        }

        return $html;
    }



    /**
     * Return the html for the read action.
     */
    public function getUsers(): string
    {
        $html = '';
		
        // Get all users :
        $usersService = new UsersService();
        $users = $usersService->getUsers();

        // Get html :
        foreach ($users as $user) {
            $carsHtml = '';
            if (!empty($user->getCars())) {
                foreach ($user->getCars() as $car) {
                    $carsHtml .= $car->getCarModel() . ' ' . $car->getColor() . ' ' . $car->getCapacity() . ' places.<br/>';
                }
            }
            
            $usersAdds = '';
            if (!empty($user->getAdds())) {
                foreach ($user->getAdds() as $add) {
                    $usersAdds .= 'N°'. $add->getId() . ' de ' . $add->getTripDepartureCity() . ' à ' . $add->getTripArrivalCity() . ' le '. $add->getTripDateAndTime()->format('d/m/Y') .'<br/>';
                }
            }

            $usersBookings = '';
            if (!empty($user->getBookings())) {
                foreach ($user->getBookings() as $booking) {
                    $usersBookings .= 'Annonce : ' . $booking->getAddId() . ', Passager : ' . $booking->getPassengerId() . '.<br/>';
                }
            }

            $html .=
                '<tr>'.
                    '<td>' . $user->getId() . '</td>' .
                    '<td>' . $user->getFirstname() . '</td>' .
                    '<td>' . $user->getLastname() . '</td>' .
                    '<td>' . $user->getEmail() . '</td>' .
                    '<td>' . $user->getBirthday()->format('d/m/Y') . '</td>'.
                    '<td>' . $carsHtml. '</td>'.
                    '<td>' . $usersAdds. '</td>'.
                    '<td>' . $usersBookings. '</td>'.
                '</tr>';
        }

        return $html;
    }

    /**
     * Update the user.
     */
    public function updateUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email']) &&
            isset($_POST['birthday'])) {
            // Update the user :
            $usersService = new UsersService();
            $isOk = $usersService->setUser(
                $_POST['id'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
            );
            if ($isOk) {
                $html = 'Utilisateur mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'utilisateur.';
            }
        }

        return $html;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the user :
            $usersService = new UsersService();
            $isOk = $usersService->deleteUser($_POST['id']);
            if ($isOk) {
                $html = 'Utilisateur supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'utilisateur.';
            }
        }

        return $html;
    }
}
