<?php

namespace App\Controller;

use App\Repository\UserRepository;

class UserController extends AbstractController {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers() {
        $users = $this->userRepository->findAllUsers();
        $this->render('users', ['users' => $users]);
    }

    public function getUserById(int $id) {
        $user = $this->userRepository->findUserById($id);
        $this->render('user_details', ['user' => $user]);
    }

    public function getUserByEmail(string $email) {
        $user = $this->userRepository->findUserByEmail($email);
        $this->render('user_details', ['user' => $user]);
    }
}