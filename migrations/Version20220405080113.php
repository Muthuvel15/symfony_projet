<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405080113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, chassis_id INT DEFAULT NULL, modele VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_292FFF1D63EE729 (chassis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule_roue (vehicule_id INT NOT NULL, roue_id INT NOT NULL, INDEX IDX_A06E989D4A4A3511 (vehicule_id), INDEX IDX_A06E989DBBF3D75F (roue_id), PRIMARY KEY(vehicule_id, roue_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D63EE729 FOREIGN KEY (chassis_id) REFERENCES chassis (id)');
        $this->addSql('ALTER TABLE vehicule_roue ADD CONSTRAINT FK_A06E989D4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vehicule_roue ADD CONSTRAINT FK_A06E989DBBF3D75F FOREIGN KEY (roue_id) REFERENCES roue (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule_roue DROP FOREIGN KEY FK_A06E989D4A4A3511');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('DROP TABLE vehicule_roue');
        $this->addSql('ALTER TABLE moteur CHANGE energie energie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE no_serie no_serie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
