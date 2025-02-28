<?php

namespace App;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Doctrine\ORM\EntityManager;
use App\Repository\PictureRepository;
use App\Repository\UserRepository;
use App\Controller\MainController;
use App\Controller\UserController;

class Container {
    private static $instance;
    private $container;

    private function __construct() {
        $this->container = new ContainerBuilder();

        // Настройка сервисов
        $this->configureServices();
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getContainer(): ContainerBuilder {
        return $this->container;
    }

    private function configureServices() {
        // EntityManager
        $this->container->register('entity_manager', EntityManager::class)
            ->setArguments([
                '%database_host%',
                '%database_user%',
                '%database_password%',
                '%database_name%',
            ]);

        // Репозитории
        $this->container->register('picture_repository', PictureRepository::class)
            ->setArguments([new Reference('entity_manager')]);

        $this->container->register('user_repository', UserRepository::class)
            ->setArguments([new Reference('entity_manager')]);

        // Контроллеры
        $this->container->register('main_controller', MainController::class)
            ->setArguments([new Reference('picture_repository')]);

        $this->container->register('user_controller', UserController::class)
            ->setArguments([new Reference('user_repository')]);
    }
}