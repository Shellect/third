<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\MyController;
use App\Model\MyModel;
use PDO;

// Подключение к базе данных
$dsn = 'mysql:host=your_host;dbname=your_dbname';
$username = 'your_username';
$password = 'your_password';
$db = new PDO($dsn, $username, $password);

// Создание экземпляров модели и контроллера
$model = new MyModel($db);
$controller = new MyController($model);

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
                    <!-- Добавьте другие заголовки столбцов, если необходимо -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <td><?php echo $record['id']; ?></td>
                        <td><?php echo $record['name']; ?></td>
                        <td><?php echo $record['description']; ?></td>
                        <!-- Добавьте другие ячейки, если необходимо -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>