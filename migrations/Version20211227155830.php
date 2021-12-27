<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227155830 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE housing ADD building_id INT NOT NULL');
        $this->addSql('ALTER TABLE housing ADD CONSTRAINT FK_FB8142C34D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id)');
        $this->addSql('CREATE INDEX IDX_FB8142C34D2A7E12 ON housing (building_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE housing DROP FOREIGN KEY FK_FB8142C34D2A7E12');
        $this->addSql('DROP INDEX IDX_FB8142C34D2A7E12 ON housing');
        $this->addSql('ALTER TABLE housing DROP building_id');
    }
}
