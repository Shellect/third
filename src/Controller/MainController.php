<?php

namespace App\Controller;

use App\Repository\PictureRepository;

class MainController {
    private $pictureRepository;

    public function __construct(PictureRepository $pictureRepository) {
        $this->pictureRepository = $pictureRepository;
    }

    public function getAllPictures() {
        return $this->pictureRepository->findAllRecords();
    }
}