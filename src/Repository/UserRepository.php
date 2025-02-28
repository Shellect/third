<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository {
    public function findAllUsers() {
        return $this->createQueryBuilder('u')
            ->getQuery()
            ->getResult();
    }

    public function findUserById(int $id): ?User {
        return $this->find($id);
    }

    public function findUserByEmail(string $email): ?User {
        return $this->findOneBy(['email' => $email]);
    }
}