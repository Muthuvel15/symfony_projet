<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405081754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE couleur ADD vehicule_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE couleur ADD CONSTRAINT FK_3C0D87E54A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('CREATE INDEX IDX_3C0D87E54A4A3511 ON couleur (vehicule_id)');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DC31BA576');
        $this->addSql('DROP INDEX IDX_292FFF1DC31BA576 ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP couleur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE couleur DROP FOREIGN KEY FK_3C0D87E54A4A3511');
        $this->addSql('DROP INDEX IDX_3C0D87E54A4A3511 ON couleur');
        $this->addSql('ALTER TABLE couleur DROP vehicule_id, CHANGE couleur couleur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE moteur CHANGE energie energie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE no_serie no_serie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vehicule ADD couleur_id INT DEFAULT NULL, CHANGE modele modele VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1DC31BA576 ON vehicule (couleur_id)');
    }
}
