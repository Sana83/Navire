<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220301095914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('DROP TABLE ais_ship_type_port');
        $this->addSql('ALTER TABLE navire ADD port_destination_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038826B9A63 FOREIGN KEY (port_destination_id) REFERENCES port (id)');
        $this->addSql('CREATE INDEX IDX_EED1038826B9A63 ON navire (port_destination_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ais_ship_type_port (ais_ship_type_id INT NOT NULL, port_id INT NOT NULL, INDEX IDX_E2C18803479E0B84 (ais_ship_type_id), INDEX IDX_E2C1880376E92A9C (port_id), PRIMARY KEY(ais_ship_type_id, port_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ais_ship_type_port ADD CONSTRAINT FK_E2C18803479E0B84 FOREIGN KEY (ais_ship_type_id) REFERENCES aisshiptype (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ais_ship_type_port ADD CONSTRAINT FK_E2C1880376E92A9C FOREIGN KEY (port_id) REFERENCES port (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE aisshiptype CHANGE libelle libelle VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message CHANGE nom nom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038826B9A63');
        $this->addSql('DROP INDEX IDX_EED1038826B9A63 ON navire');
        $this->addSql('ALTER TABLE navire DROP port_destination_id, CHANGE imo imo VARCHAR(7) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mmsi mmsi VARCHAR(9) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE indicatif_appel indicatif_appel VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE pays CHANGE nom nom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE indicatif indicatif VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE port CHANGE nom nom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE indicatif indicatif VARCHAR(5) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
