<?php

namespace App\Controller;

use App\Repository\PictureRepository;

class MyController {
    private $pictureRepository;

    public function __construct(PictureRepository $pictureRepository) {
        $this->pictureRepository = $pictureRepository;
    }

    public function getAllRecords() {
        return $this->pictureRepository->findAllRecords();
    }
}