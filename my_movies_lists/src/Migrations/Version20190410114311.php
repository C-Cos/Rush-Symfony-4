<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190410114311 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lists ADD movie_id INT NOT NULL');
        $this->addSql('ALTER TABLE lists ADD CONSTRAINT FK_8269FA58F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('CREATE INDEX IDX_8269FA58F93B6FC ON lists (movie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lists DROP FOREIGN KEY FK_8269FA58F93B6FC');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP INDEX IDX_8269FA58F93B6FC ON lists');
        $this->addSql('ALTER TABLE lists DROP movie_id');
    }
}
