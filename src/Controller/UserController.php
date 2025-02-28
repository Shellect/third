<?php

namespace App\Controller;

use App\Repository\UserRepository;

class UserController {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers() {
        return $this->userRepository->findAllUsers();
    }

    public function getUserById(int $id) {
        return $this->userRepository->findUserById($id);
    }

    public function getUserByEmail(string $email) {
        return $this->userRepository->findUserByEmail($email);
    }
}