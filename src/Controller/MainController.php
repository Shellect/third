<?php

namespace App\Controller;

use App\Repository\PictureRepository;

class MainController extends AbstractController {
    private $pictureRepository;

    public function __construct(PictureRepository $pictureRepository) {
        $this->pictureRepository = $pictureRepository;
    }

    public function getAllPictures() {
        $pictures = $this->pictureRepository->findAllRecords();
        $this->render('pictures', ['pictures' => $pictures]);
    }
}