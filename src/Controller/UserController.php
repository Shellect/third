<?php

namespace App\Controller;

use App\Entity\User;

class UserController extends AbstractController {

    public function getAllUsers() {
        $users = $this->entityManager
            ->getRepository(User::class)
            ->findAll();
        $this->render('users', ['users' => $users]);
    }

    public function getUserById(int $id) {
        $user = $this->entityManager
            ->getRepository(User::class)
            ->find($id);
        $this->render('user_details', ['user' => $user]);
    }

    public function getUserByEmail(string $email) {
        $user = $this->entityManager
            ->getRepository(User::class)
            ->findOneBy(['email' => $email]);
        $this->render('user_details', ['user' => $user]);
    }
}