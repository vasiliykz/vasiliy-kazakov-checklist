<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211130074003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Article Entity';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE article (
                id INT AUTO_INCREMENT NOT NULL, 
                title VARCHAR(127) NOT NULL, 
                date DATE NOT NULL, 
                text LONGTEXT NOT NULL, 
                category_id INT NOT NULL default 1, 
                author_id INT NOT NULL default 1, 
                PRIMARY KEY(id)
            ) 
            DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE article');
    }
}
