<?php
// Получаем EntityManager из bootstrap.php
$entityManager = require __DIR__ . '/../bootstrap.php';

// Получаем Service Container
$container = \App\Container::getInstance()->getContainer();

// Получаем контроллеры из контейнера
$mainController = $container->get('main_controller');
$userController = $container->get('user_controller');

// Обработка запросов
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'getAllPictures':
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