<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190410162528 extends AbstractMigration
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
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, create_date DATETIME NOT NULL, modify_date DATETIME DEFAULT NULL, profile_desc LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lists (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, movie_id INT NOT NULL, listname VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, create_date DATETIME NOT NULL, edit_date DATETIME DEFAULT NULL, privacy TINYINT(1) NOT NULL, INDEX IDX_8269FA5A76ED395 (user_id), INDEX IDX_8269FA58F93B6FC (movie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lists ADD CONSTRAINT FK_8269FA5A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE lists ADD CONSTRAINT FK_8269FA58F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lists DROP FOREIGN KEY FK_8269FA58F93B6FC');
        $this->addSql('ALTER TABLE lists DROP FOREIGN KEY FK_8269FA5A76ED395');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE lists');
    }
}
