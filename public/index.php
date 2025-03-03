<?php
require_once __DIR__ . '/../vendor/autoload.php';

$container = \App\Container::getInstance()->getContainer();
$userController = $container->get('user_controller');

// Обработка запросов
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'getAllPictures':
            $mainController = $container->get('main_controller');
            $mainController->getAllPictures();
            break;
        case 'getAllUsers':
            $userController->getAllUsers();
            break;
        case 'getUserById':
            $userId = $_GET['id'] ?? 0;
            $userController->getUserById($userId);
            break;
        case 'getUserByEmail':
            $email = $_GET['email'] ?? '';
            $userController->getUserByEmail($email);
            break;
        default:
            echo "Invalid action.";
            break;
    }
} else {
    echo "Welcome to the main page.";
}
