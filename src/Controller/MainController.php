<?php

namespace App\Controller;

use App\Entity\Picture;

class MainController extends AbstractController {

    public function getAllPictures() {
        $pictures = $this
            ->entityManager
            ->getRepository(Picture::class)
            ->findAll();
        $this->render('pictures', ['pictures' => $pictures]);
    }
}