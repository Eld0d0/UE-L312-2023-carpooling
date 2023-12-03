<?php

namespace App\Services;

use App\Entities\Add;
use App\Entities\Booking;
use DateTime;

class AddsService
{
    /**
     * Create or update an add.
     */
    public function setAdd(?string $id, string $driverId, string $carId, DateTime $tripDateAndTime, string $tripDepartureCity, string $tripArrivalCity): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createAdd($driverId, $carId, $tripDateAndTime, $tripDepartureCity, $tripArrivalCity);
        } else {
            $isOk = $dataBaseService->updateAdd($id, $driverId, $carId, $tripDateAndTime, $tripDepartureCity, $tripArrivalCity);
        }

        return $isOk;
    }

    /**
     * Return all adds.
     */
    public function getAdds(): array
    {
        $adds = [];

        $dataBaseService = new DataBaseService();
        $addsDTO = $dataBaseService->getAdds();
        if (!empty($addsDTO)) {
            foreach ($addsDTO as $addDTO) {
                $add = new Add();
                $add->setId($addDTO['id']);
                $add->setDriverId($addDTO['driverId']);
                $add->setCarId($addDTO['carId']);
                $add->setTripDepartureCity($addDTO['tripDepartureCity']);
                $add->setTripArrivalCity($addDTO['tripArrivalCity']);
                $tripDateAndTime = new DateTime($addDTO['tripDateAndTime']);
                if ($tripDate !== false) {
                    $add->setTripDateAndTime($tripDateAndTime);
                }

                // Get Bookings of this add :
                $bookings = $this->getAddBookings($addDTO['id']);
                $add->setBookings($bookings);


                $adds[] = $add;
            }
        }

        return $adds;
    }

    /**
     * Delete an add.
     */
    public function deleteAdd(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAdd($id);

        return $isOk;
    }


    /**
     * Create relation bewteen an add and bookings.
     */
    public function setAddBooking(string $addId, string $bookingId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAddBooking($addId, $bookingId);

        return $isOk;
    }

    /**
     * Get bookings of given add id.
     */
    public function getAddBookings(string $addId): array
    {
        $addBookings = [];

        $dataBaseService = new DataBaseService();

        // Get relation adds and bookings :
        $addsBookingsDTO = $dataBaseService->getUserBookings($addId);
        if (!empty($addsBookingsDTO)) {
            foreach ($addsBookingsDTO as $addBookingDTO) {
                $booking = new Booking();
                $booking->setId($addBookingDTO['id']);
                $booking->setaddId($addBookingDTO['addId']);
                $booking->setPassengerId($addBookingDTO['passengerId']);
                $addBookings[] = $booking;
            }
        }   
        return $addBookings;
    }

}
