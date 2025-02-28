<?php

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use App\Container;

require_once __DIR__ . '/vendor/autoload.php';

// Путь к сущностям
$paths = [__DIR__ . '/src/Entity'];

// Режим разработки (true для разработки, false для продакшена)
$isDevMode = true;

// Параметры подключения к базе данных
$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => 'your_host',
    'user'     => 'your_username',
    'password' => 'your_password',
    'dbname'   => 'your_dbname',
];

// Настройка Doctrine
$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

// Создание соединения с базой данных
$connection = DriverManager::getConnection($dbParams, $config);

// Создание EntityManager
// Создание EntityManager
$entityManager = new EntityManager($connection, $config);

// Установка параметров для Service Container
$container = Container::getInstance()->getContainer();
$container->setParameter('database_host', $dbParams['host']);
$container->setParameter('database_user', $dbParams['user']);
$container->setParameter('database_password', $dbParams['password']);
$container->setParameter('database_name', $dbParams['dbname']);

return $entityManager;