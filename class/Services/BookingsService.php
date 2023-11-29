<?php

namespace App\Services;

use App\Entities\Booking;

class BookingsService
{
    /**
     * Create or update a booking.
     */
    public function setBooking(?string $id, string $addId, string $passengerId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createBooking($addId, $passengerId);
        } else {
            $isOk = $dataBaseService->updateBooking($id, $addId, $passengerId);
        }

        return $isOk;
    }

    /**
     * Return all bookings.
     */
    public function getBookings(): array
    {
        $bookings = [];

        $dataBaseService = new DataBaseService();
        $bookingsDTO = $dataBaseService->getBookings();
        if (!empty($bookingsDTO)) {
            foreach ($bookingsDTO as $bookingDTO) {
                $booking = new Booking();
                $booking->setId($bookingDTO['id']);
                $booking->setaddId($bookingDTO['addId']);
                $booking->setPassengerId($bookingDTO['passengerId']);
                $bookings[] = $booking;
            }
        }

        return $bookings;
    }

    /**
     * Delete a booking.
     */
    public function deleteBooking(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteBooking($id);

        return $isOk;
    }
}
