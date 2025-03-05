<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250305161845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create tables for Picture and User entities';
    }

    public function up(Schema $schema): void
    {
        // Создание таблицы pictures
        $this->addSql('
            CREATE TABLE pictures (
                id INT AUTO_INCREMENT NOT NULL,
                name VARCHAR(191) NOT NULL,
                description VARCHAR(191) NOT NULL,
                PRIMARY KEY(id)
            )
        ');

        // Создание таблицы users
        $this->addSql('
            CREATE TABLE users (
                id INT AUTO_INCREMENT NOT NULL,
                username VARCHAR(191) NOT NULL,
                email VARCHAR(191) NOT NULL,
                password VARCHAR(191) NOT NULL,
                PRIMARY KEY(id)
            )
        ');
    }

    public function down(Schema $schema): void
    {
        // Удаление таблиц при откате миграции
        $this->addSql('DROP TABLE pictures');
        $this->addSql('DROP TABLE users');
    }
}
