<?php

namespace App\Controllers;

use App\Services\AdvertsService;

class AdvertsController
{
    public function createAdvert(): string
    {
        $html = '';

        if (isset($_POST['iddriver']) &&
            isset($_POST['idcar']) &&
            isset($_POST['citystart']) &&
            isset($_POST['cityend']) &&
            isset($_POST['date'])) {
                
            $advertsService = new AdvertsService();
            $isOk = $advertsService->setAdvert(
                null,
                $_POST['iddriver'],
                $_POST['idcar'],
                $_POST['citystart'],
                $_POST['cityend'],
                $_POST['date']
            );
            if ($isOk) {
                $html = 'Annonce créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'annonce.';
            }
        }

        return $html;
    }

    public function getAdverts(): string
    {
        $html = '';

        $advertsService = new AdvertsService();
        $adverts = $advertsService->getAdverts();

        foreach ($adverts as $advert) {
            $html .=
                '#' . $advert->getId() . ' ' .
                $advert->getIdDriver() . ' ' .
                $advert->getIdCar() . ' ' .
                $advert->getCityStart() . ' ' .
                $advert->getCityEnd() . ' ' .
                $advert->getDate()->format('d-m-Y') . '<br />';
        }

        return $html;
    }

    public function updateAdvert(): string
    {
        $html = '';

        if (isset($_POST['id']) &&
            isset($_POST['iddriver']) &&
            isset($_POST['idcar']) &&
            isset($_POST['citystart']) &&
            isset($_POST['cityend']) &&
            isset($_POST['date'])) {

            $advertsService = new AdvertsService();
            $isOk = $advertsService->setAdvert(
                $_POST['id'],
                $_POST['iddriver'],
                $_POST['idcar'],
                $_POST['citystart'],
                $_POST['cityend'],
                $_POST['date']
            );
            if ($isOk) {
                $html = 'Annonce mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annonce.';
            }
        }

        return $html;
    }

    public function deleteAdvert(): string
    {
        $html = '';

        if (isset($_POST['id'])) {

            $advertsService = new AdvertsService();
            $isOk = $advertsService->deleteAdvert($_POST['id']);
            if ($isOk) {
                $html = 'Annonce supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce.';
            }
        }

        return $html;
    }
}
