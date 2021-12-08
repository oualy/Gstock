<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125143737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vente_produits ADD produits_id INT NOT NULL');
        $this->addSql('ALTER TABLE vente_produits ADD CONSTRAINT FK_1E783768CD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        $this->addSql('CREATE INDEX IDX_1E783768CD11A2CF ON vente_produits (produits_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vente_produits DROP FOREIGN KEY FK_1E783768CD11A2CF');
        $this->addSql('DROP INDEX IDX_1E783768CD11A2CF ON vente_produits');
        $this->addSql('ALTER TABLE vente_produits DROP produits_id');
    }
}
