<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128095151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pret_instrument (id INT AUTO_INCREMENT NOT NULL, eleve_id INT NOT NULL, instrument_id INT NOT NULL, date_pret DATE NOT NULL, INDEX IDX_DA6D552CA6CC7B2 (eleve_id), INDEX IDX_DA6D552CCF11D9C (instrument_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pret_instrument ADD CONSTRAINT FK_DA6D552CA6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE pret_instrument ADD CONSTRAINT FK_DA6D552CCF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        $this->addSql('DROP TABLE classe_instrument');
        $this->addSql('DROP TABLE cours_jour');
        $this->addSql('DROP TABLE cours_tranche');
        $this->addSql('DROP TABLE jour');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE professeur');
        $this->addSql('DROP TABLE tarif');
        $this->addSql('DROP TABLE tranche');
        $this->addSql('DROP TABLE type_instrument');
        $this->addSql('ALTER TABLE accessoire CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE accessoire ADD CONSTRAINT FK_8FD026ACF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        $this->addSql('ALTER TABLE couleur CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE couleur_instrument ADD PRIMARY KEY (couleur_id, instrument_id)');
        $this->addSql('ALTER TABLE couleur_instrument ADD CONSTRAINT FK_2E62255DC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE couleur_instrument ADD CONSTRAINT FK_2E62255DCF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_2E62255DC31BA576 ON couleur_instrument (couleur_id)');
        $this->addSql('CREATE INDEX IDX_2E62255DCF11D9C ON couleur_instrument (instrument_id)');
        $this->addSql('ALTER TABLE instrument DROP type_intrument_id, DROP marque_id, DROP libelle, CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe_instrument (id INT NOT NULL, libelle VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cours_jour (cours_id INT NOT NULL, jour_id INT NOT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cours_tranche (cours_id INT NOT NULL, tranche_id INT NOT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE jour (id INT NOT NULL, libelle VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE marque (id INT NOT NULL, libelle VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE professeur (id INT NOT NULL, compte_id INT NOT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tarif (id INT NOT NULL, montant VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tranche (id INT NOT NULL, libelle VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, quotient_mini VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_instrument (id INT NOT NULL, libelle VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, classe_intrument_id INT DEFAULT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pret_instrument DROP FOREIGN KEY FK_DA6D552CA6CC7B2');
        $this->addSql('ALTER TABLE pret_instrument DROP FOREIGN KEY FK_DA6D552CCF11D9C');
        $this->addSql('DROP TABLE pret_instrument');
        $this->addSql('ALTER TABLE accessoire DROP FOREIGN KEY FK_8FD026ACF11D9C');
        $this->addSql('ALTER TABLE accessoire CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE couleur CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE couleur_instrument DROP FOREIGN KEY FK_2E62255DC31BA576');
        $this->addSql('ALTER TABLE couleur_instrument DROP FOREIGN KEY FK_2E62255DCF11D9C');
        $this->addSql('DROP INDEX IDX_2E62255DC31BA576 ON couleur_instrument');
        $this->addSql('DROP INDEX IDX_2E62255DCF11D9C ON couleur_instrument');
        $this->addSql('DROP INDEX `primary` ON couleur_instrument');
        $this->addSql('ALTER TABLE instrument MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON instrument');
        $this->addSql('ALTER TABLE instrument ADD type_intrument_id INT DEFAULT NULL, ADD marque_id INT DEFAULT NULL, ADD libelle VARCHAR(50) DEFAULT NULL, CHANGE id id INT NOT NULL');
    }
}
