<?php

namespace App;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Doctrine\ORM\EntityManager;
use App\Controller\MainController;
use App\Controller\UserController;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;

class Container
{
    private static $instance;
    private $container;

    private function __construct()
    {
        $this->container = new ContainerBuilder();

        // Настройка сервисов
        $this->configureServices();
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getContainer(): ContainerBuilder
    {
        return $this->container;
    }

    private function configureServices()
    {
        $paths = [__DIR__ . '/../src/Entity'];
        $isDevMode = true;
        $dbParams = [
            'driver'   => 'pdo_mysql',
            'host'     => $_ENV['DATABASE_HOST'],
            'user'     => $_ENV['DATABASE_USER'],
            'password' => $_ENV['DATABASE_PASSWORD'],
            'dbname'   => $_ENV['DATABASE_NAME'],
        ];

        $config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
        $connection = DriverManager::getConnection($dbParams, $config);

        // EntityManager
        $this->container->register('entity_manager', EntityManager::class)
            ->setArguments([$connection, $config]);

        // Контроллеры
        $this->container->register('main_controller', MainController::class)
            ->setArguments([new Reference('entity_manager')]);

        $this->container->register('user_controller', UserController::class)
            ->setArguments([new Reference('entity_manager')]);
    }
}
