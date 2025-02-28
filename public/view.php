<?php
use App\Controller\MyController;
use App\Entity\Picture;

// Получаем EntityManager из bootstrap.php
$entityManager = require __DIR__ . '/../bootstrap.php';

// Создание репозитория и контроллера
$pictureRepository = $entityManager->getRepository(Picture::class);
$controller = new MyController($pictureRepository);

// Обработка нажатия кнопки
if (isset($_GET['action']) && $_GET['action'] == 'getAllRecords') {
    $records = $controller->getAllRecords();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Records</title>
</head>
<body>
    <a href="view.php?action=getAllRecords">All Records</a>

    <?php if (!empty($records)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <td><?php echo $record->getId(); ?></td>
                        <td><?php echo $record->getName(); ?></td>
                        <td><?php echo $record->getDescription(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>