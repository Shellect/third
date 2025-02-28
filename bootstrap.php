<?php

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;

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
$entityManager = new EntityManager($connection, $config);

return $entityManager;