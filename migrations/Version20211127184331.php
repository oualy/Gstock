<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211127184331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vente_produits (vente_id INT NOT NULL, produits_id INT NOT NULL, INDEX IDX_1E7837687DC7170A (vente_id), INDEX IDX_1E783768CD11A2CF (produits_id), PRIMARY KEY(vente_id, produits_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vente_produits ADD CONSTRAINT FK_1E7837687DC7170A FOREIGN KEY (vente_id) REFERENCES vente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vente_produits ADD CONSTRAINT FK_1E783768CD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vente_produits');
    }
}
