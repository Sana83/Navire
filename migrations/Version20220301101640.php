<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220301101640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038826B9A63');
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038EA83FAE4');
        $this->addSql('DROP INDEX IDX_EED1038826B9A63 ON navire');
        $this->addSql('DROP INDEX IDX_EED1038EA83FAE4 ON navire');
        $this->addSql('ALTER TABLE navire CHANGE port_destination_id idportdestination INT DEFAULT NULL, CHANGE le_type_id idAisShipType INT NOT NULL');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038E62DB837 FOREIGN KEY (idAisShipType) REFERENCES aisshiptype (id)');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038427CFE1F FOREIGN KEY (idportdestination) REFERENCES port (id)');
        $this->addSql('CREATE INDEX IDX_EED1038E62DB837 ON navire (idAisShipType)');
        $this->addSql('CREATE INDEX IDX_EED1038427CFE1F ON navire (idportdestination)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aisshiptype CHANGE libelle libelle VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message CHANGE nom nom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038E62DB837');
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038427CFE1F');
        $this->addSql('DROP INDEX IDX_EED1038E62DB837 ON navire');
        $this->addSql('DROP INDEX IDX_EED1038427CFE1F ON navire');
        $this->addSql('ALTER TABLE navire CHANGE imo imo VARCHAR(7) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mmsi mmsi VARCHAR(9) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE indicatif_appel indicatif_appel VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE idAisShipType le_type_id INT NOT NULL, CHANGE idportdestination port_destination_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038826B9A63 FOREIGN KEY (port_destination_id) REFERENCES port (id)');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038EA83FAE4 FOREIGN KEY (le_type_id) REFERENCES aisshiptype (id)');
        $this->addSql('CREATE INDEX IDX_EED1038826B9A63 ON navire (port_destination_id)');
        $this->addSql('CREATE INDEX IDX_EED1038EA83FAE4 ON navire (le_type_id)');
        $this->addSql('ALTER TABLE pays CHANGE nom nom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE indicatif indicatif VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE port CHANGE nom nom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE indicatif indicatif VARCHAR(5) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
