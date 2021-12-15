<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211215085433 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE article CHANGE category_id category_id INT NOT NULL, CHANGE author_id author_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE article CHANGE category_id category_id INT DEFAULT 1 NOT NULL, CHANGE author_id author_id INT DEFAULT 1 NOT NULL');
    }
}
