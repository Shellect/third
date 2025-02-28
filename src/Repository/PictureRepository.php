<?php

namespace App\Repository;

use App\Model\Entity\Picture;
use Doctrine\ORM\EntityRepository;

class PictureRepository extends EntityRepository {
    public function findAllRecords() {
        return $this->createQueryBuilder('p')
            ->getQuery()
            ->getResult();
    }
}