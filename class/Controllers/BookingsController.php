<?php

namespace App\Controllers;

use App\Services\BookingsService;

class BookingsController
{
    /**
     * Return the html for the create action.
     */
    public function createBooking(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['addId']) &&
            isset($_POST['passengerId'])) {
            // Create a booking :
            $bookingsService = new BookingsService();
            $isOk = $bookingsService->setBooking(
                null,
                $_POST['addId'],
                $_POST['passengerId']
            );
            if ($isOk) {
                $html = 'Réservation créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getBookings(): string
    {
        $html = '';

        // Get all bookings :
        $bookingsService = new BookingsService();
        $bookings = $bookingsService->getBookings();

        // Get html :
        foreach ($bookings as $booking) {
            $html .=
                '#' . $booking->getId() . ' ' .
                $booking->getAddId() . ' ' .
                $booking->getPassengerId() . '<br/>' ;
        }

        return $html;
    }

    /**
     * Update a booking.
     */
    public function updateBooking(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['addId']) &&
            isset($_POST['passengerId'])) {
            // Update the booking :
            $bookingsService = new BookingsService();
            $isOk = $bookingsService->setBooking(
                $_POST['id'],
                $_POST['addId'],
                $_POST['passengerId']
            );
            if ($isOk) {
                $html = 'Réservations mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Delete a booking.
     */
    public function deleteBooking(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the user :
            $bookingsService = new BookingsService();
            $isOk = $bookingsService->deleteBooking($_POST['id']);
            if ($isOk) {
                $html = 'Réservation supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la réservation.';
            }
        }

        return $html;
    }
}
