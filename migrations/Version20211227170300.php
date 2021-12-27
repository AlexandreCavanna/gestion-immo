<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227170300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lodger ADD housing_id INT NOT NULL');
        $this->addSql('ALTER TABLE lodger ADD CONSTRAINT FK_8ACBBC1DAD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('CREATE INDEX IDX_8ACBBC1DAD5873E3 ON lodger (housing_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lodger DROP FOREIGN KEY FK_8ACBBC1DAD5873E3');
        $this->addSql('DROP INDEX IDX_8ACBBC1DAD5873E3 ON lodger');
        $this->addSql('ALTER TABLE lodger DROP housing_id');
    }
}
