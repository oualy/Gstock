<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211127165554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vente ADD clients_id INT NOT NULL');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CAB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('CREATE INDEX IDX_888A2A4CAB014612 ON vente (clients_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4CAB014612');
        $this->addSql('DROP INDEX IDX_888A2A4CAB014612 ON vente');
        $this->addSql('ALTER TABLE vente DROP clients_id');
    }
}
