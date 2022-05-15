<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220505112824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add product table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE products (id CHAR(36) NOT NULL COMMENT \'(DC2Type:productId)\', name VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE products');
    }
}
