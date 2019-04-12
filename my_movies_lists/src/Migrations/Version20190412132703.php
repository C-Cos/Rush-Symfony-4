<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190412132703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE movie ADD users_id INT DEFAULT NULL, ADD create_date DATETIME DEFAULT NULL, ADD edit_date DATETIME DEFAULT NULL, ADD listname VARCHAR(255) DEFAULT NULL, ADD privacy TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26F67B3B43D ON movie (users_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F67B3B43D');
        $this->addSql('DROP INDEX IDX_1D5EF26F67B3B43D ON movie');
        $this->addSql('ALTER TABLE movie DROP users_id, DROP create_date, DROP edit_date, DROP listname, DROP privacy');
    }
}
