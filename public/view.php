<?php
use App\Controller\MainController;
use App\Controller\UserController;
use App\Entity\Picture;
use App\Entity\User;

// Получаем EntityManager из bootstrap.php
$entityManager = require __DIR__ . '/../bootstrap.php';

// Создание репозиториев и контроллеров
$pictureRepository = $entityManager->getRepository(Picture::class);
$userRepository = $entityManager->getRepository(User::class);

$mainController = new MainController($pictureRepository);
$userController = new UserController($userRepository);

// Обработка запросов
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'getAllPictures':
            $pictures = $mainController->getAllPictures();
            break;
        case 'getAllUsers':
            $users = $userController->getAllUsers();
            break;
        case 'getUserById':
            $userId = $_GET['id'] ?? 0;
            $user = $userController->getUserById($userId);
            break;
        case 'getUserByEmail':
            $email = $_GET['email'] ?? '';
            $user = $userController->getUserByEmail($email);
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Page</title>
</head>
<body>
    <h1>Main Page</h1>

    <h2>Pictures</h2>
    <a href="view.php?action=getAllPictures">Get All Pictures</a>
    <?php if (!empty($pictures)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pictures as $picture): ?>
                    <tr>
                        <td><?php echo $picture->getId(); ?></td>
                        <td><?php echo $picture->getName(); ?></td>
                        <td><?php echo $picture->getDescription(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <h2>Users</h2>
    <a href="view.php?action=getAllUsers">Get All Users</a>
    <?php if (!empty($users)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user->getId(); ?></td>
                        <td><?php echo $user->getUsername(); ?></td>
                        <td><?php echo $user->getEmail(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <h2>Find User by ID</h2>
    <form action="view.php" method="get">
        <input type="hidden" name="action" value="getUserById">
        <label for="id">User ID:</label>
        <input type="number" id="id" name="id" required>
        <button type="submit">Find</button>
    </form>

    <?php if (!empty($user)): ?>
        <h3>User Details</h3>
        <p>ID: <?php echo $user->getId(); ?></p>
        <p>Username: <?php echo $user->getUsername(); ?></p>
        <p>Email: <?php echo $user->getEmail(); ?></p>
    <?php endif; ?>

    <h2>Find User by Email</h2>
    <form action="view.php" method="get">
        <input type="hidden" name="action" value="getUserByEmail">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Find</button>
    </form>

    <?php if (!empty($user)): ?>
        <h3>User Details</h3>
        <p>ID: <?php echo $user->getId(); ?></p>
        <p>Username: <?php echo $user->getUsername(); ?></p>
        <p>Email: <?php echo $user->getEmail(); ?></p>
    <?php endif; ?>
</body>
</html>