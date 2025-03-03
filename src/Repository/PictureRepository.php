<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class PictureRepository extends EntityRepository {
    public function findAllRecords() {
        return $this->createQueryBuilder('p')
            ->getQuery()
            ->getResult();
    }
}