<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220301082532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(60) NOT NULL, indicatif VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aisshiptype CHANGE aisshiptype ais_ship_type INT NOT NULL');
        $this->addSql('ALTER TABLE navire ADD idpays INT NOT NULL');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038E750CD0E FOREIGN KEY (idpays) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_EED1038E750CD0E ON navire (idpays)');
        $this->addSql('ALTER TABLE navire RENAME INDEX fk_eed1038ea83fae4 TO IDX_EED1038EA83FAE4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038E750CD0E');
        $this->addSql('DROP TABLE pays');
        $this->addSql('ALTER TABLE aisshiptype CHANGE libelle libelle VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ais_ship_type aisshiptype INT NOT NULL');
        $this->addSql('ALTER TABLE message CHANGE nom nom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_EED1038E750CD0E ON navire');
        $this->addSql('ALTER TABLE navire DROP idpays, CHANGE imo imo VARCHAR(7) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mmsi mmsi VARCHAR(9) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE indicatif_appel indicatif_appel VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE navire RENAME INDEX idx_eed1038ea83fae4 TO FK_EED1038EA83FAE4');
    }
}
