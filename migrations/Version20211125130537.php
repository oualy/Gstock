<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125130537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vente_produits ADD clients_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vente_produits ADD CONSTRAINT FK_1E783768AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('CREATE INDEX IDX_1E783768AB014612 ON vente_produits (clients_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vente_produits DROP FOREIGN KEY FK_1E783768AB014612');
        $this->addSql('DROP INDEX IDX_1E783768AB014612 ON vente_produits');
        $this->addSql('ALTER TABLE vente_produits DROP clients_id');
    }
}
