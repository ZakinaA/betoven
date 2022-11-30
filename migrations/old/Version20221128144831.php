<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128144831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE eleves (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE responsable (id INT AUTO_INCREMENT NOT NULL, compte_id INT NOT NULL, UNIQUE INDEX UNIQ_52520D07F2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('ALTER TABLE responsable ADD CONSTRAINT FK_52520D07F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        //$this->addSql('DROP TABLE cours_tranche');
        //$this->addSql('DROP TABLE cours_jour');
        //$this->addSql('DROP TABLE jour');
        //$this->addSql('ALTER TABLE accessoire CHANGE id id INT AUTO_INCREMENT NOT NULL');
        //$this->addSql('ALTER TABLE accessoire ADD CONSTRAINT FK_8FD026ACF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        //$this->addSql('ALTER TABLE classe_instrument CHANGE id id INT AUTO_INCREMENT NOT NULL');
        //$this->addSql('ALTER TABLE compte CHANGE num_rue num_rue VARCHAR(10) NOT NULL, CHANGE copos copos VARCHAR(10) NOT NULL, CHANGE tel tel VARCHAR(10) NOT NULL, CHANGE mot_de_passe mot_de_passe VARCHAR(50) NOT NULL');
        //$this->addSql('ALTER TABLE couleur CHANGE id id INT AUTO_INCREMENT NOT NULL');
        //$this->addSql('ALTER TABLE couleur_instrument ADD PRIMARY KEY (couleur_id, instrument_id)');
        //$this->addSql('ALTER TABLE couleur_instrument ADD CONSTRAINT FK_2E62255DC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        //$this->addSql('ALTER TABLE couleur_instrument ADD CONSTRAINT FK_2E62255DCF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id) ON DELETE CASCADE');
        //$this->addSql('CREATE INDEX IDX_2E62255DC31BA576 ON couleur_instrument (couleur_id)');
        //$this->addSql('CREATE INDEX IDX_2E62255DCF11D9C ON couleur_instrument (instrument_id)');
        //$this->addSql('ALTER TABLE cours ADD professeur_id INT NOT NULL, CHANGE libelle libelle VARCHAR(20) NOT NULL');
        //$this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CBAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id)');
        //$this->addSql('CREATE INDEX IDX_FDCA8C9CBAB22EE9 ON cours (professeur_id)');
        //$this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F753C59D72');
        //$this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F753C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id)');
        //$this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6A6CC7B2');
        //$this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6B7942F03');
        //$this->addSql('DROP INDEX IDX_5E90F6D6A6CC7B2 ON inscription');
        //$this->addSql('DROP INDEX IDX_5E90F6D6B7942F03 ON inscription');
       // $this->addSql('ALTER TABLE inscription ADD eleves_id INT NOT NULL, DROP eleve_id, DROP cour_id');
        //$this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6C2140342 FOREIGN KEY (eleves_id) REFERENCES eleve (id)');
        //$this->addSql('CREATE INDEX IDX_5E90F6D6C2140342 ON inscription (eleves_id)');
        //$this->addSql('ALTER TABLE instrument ADD libelle VARCHAR(50) DEFAULT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        //$this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DD678F9781 FOREIGN KEY (type_intrument_id) REFERENCES type_instrument (id)');
        //$this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DD4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
       // $this->addSql('CREATE INDEX IDX_3CBF69DD678F9781 ON instrument (type_intrument_id)');
        //$this->addSql('CREATE INDEX IDX_3CBF69DD4827B9B2 ON instrument (marque_id)');
        //$this->addSql('ALTER TABLE marque CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        //$this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1E5DAC5993');
        //$this->addSql('DROP INDEX IDX_B1DC7A1E5DAC5993 ON paiement');
        //$this->addSql('ALTER TABLE paiement CHANGE montant montant VARCHAR(10) NOT NULL, CHANGE inscription_id paiement_inscription_id INT NOT NULL');
        //$this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1ECC8D54EE FOREIGN KEY (paiement_inscription_id) REFERENCES inscription (id)');
        //$this->addSql('CREATE INDEX IDX_B1DC7A1ECC8D54EE ON paiement (paiement_inscription_id)');
        //$this->addSql('ALTER TABLE professeur CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
       // $this->addSql('ALTER TABLE professeur ADD CONSTRAINT FK_17A55299F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
       // $this->addSql('CREATE UNIQUE INDEX UNIQ_17A55299F2C56620 ON professeur (compte_id)');
       // $this->addSql('ALTER TABLE tarif CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
      //  $this->addSql('ALTER TABLE tranche CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
      //  $this->addSql('ALTER TABLE type_instrument CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
      //  $this->addSql('ALTER TABLE type_instrument ADD CONSTRAINT FK_21BCBFF841B1A738 FOREIGN KEY (classe_intrument_id) REFERENCES classe_instrument (id)');
       // $this->addSql('CREATE INDEX IDX_21BCBFF841B1A738 ON type_instrument (classe_intrument_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F753C59D72');
        $this->addSql('CREATE TABLE cours_tranche (cours_id INT NOT NULL, tranche_id INT NOT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cours_jour (cours_id INT NOT NULL, jour_id INT NOT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE jour (id INT NOT NULL, libelle VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE responsable DROP FOREIGN KEY FK_52520D07F2C56620');
        $this->addSql('DROP TABLE eleves');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('ALTER TABLE couleur CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F753C59D72');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F753C59D72 FOREIGN KEY (responsable_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE tarif MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON tarif');
        $this->addSql('ALTER TABLE tarif CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE accessoire DROP FOREIGN KEY FK_8FD026ACF11D9C');
        $this->addSql('ALTER TABLE accessoire CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE couleur_instrument DROP FOREIGN KEY FK_2E62255DC31BA576');
        $this->addSql('ALTER TABLE couleur_instrument DROP FOREIGN KEY FK_2E62255DCF11D9C');
        $this->addSql('DROP INDEX IDX_2E62255DC31BA576 ON couleur_instrument');
        $this->addSql('DROP INDEX IDX_2E62255DCF11D9C ON couleur_instrument');
        $this->addSql('DROP INDEX `primary` ON couleur_instrument');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6C2140342');
        $this->addSql('DROP INDEX IDX_5E90F6D6C2140342 ON inscription');
        $this->addSql('ALTER TABLE inscription ADD cour_id INT NOT NULL, CHANGE eleves_id eleve_id INT NOT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6B7942F03 FOREIGN KEY (cour_id) REFERENCES cours (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6A6CC7B2 ON inscription (eleve_id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6B7942F03 ON inscription (cour_id)');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CBAB22EE9');
        $this->addSql('DROP INDEX IDX_FDCA8C9CBAB22EE9 ON cours');
        $this->addSql('ALTER TABLE cours DROP professeur_id, CHANGE libelle libelle VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE professeur MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE professeur DROP FOREIGN KEY FK_17A55299F2C56620');
        $this->addSql('DROP INDEX UNIQ_17A55299F2C56620 ON professeur');
        $this->addSql('DROP INDEX `primary` ON professeur');
        $this->addSql('ALTER TABLE professeur CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE compte CHANGE num_rue num_rue VARCHAR(3) NOT NULL, CHANGE copos copos VARCHAR(50) NOT NULL, CHANGE tel tel VARCHAR(50) NOT NULL, CHANGE mot_de_passe mot_de_passe VARCHAR(70) NOT NULL');
        $this->addSql('ALTER TABLE type_instrument MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE type_instrument DROP FOREIGN KEY FK_21BCBFF841B1A738');
        $this->addSql('DROP INDEX IDX_21BCBFF841B1A738 ON type_instrument');
        $this->addSql('DROP INDEX `primary` ON type_instrument');
        $this->addSql('ALTER TABLE type_instrument CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE marque MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON marque');
        $this->addSql('ALTER TABLE marque CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE tranche MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON tranche');
        $this->addSql('ALTER TABLE tranche CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE classe_instrument CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE instrument MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DD678F9781');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DD4827B9B2');
        $this->addSql('DROP INDEX IDX_3CBF69DD678F9781 ON instrument');
        $this->addSql('DROP INDEX IDX_3CBF69DD4827B9B2 ON instrument');
        $this->addSql('DROP INDEX `primary` ON instrument');
        $this->addSql('ALTER TABLE instrument DROP libelle, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1ECC8D54EE');
        $this->addSql('DROP INDEX IDX_B1DC7A1ECC8D54EE ON paiement');
        $this->addSql('ALTER TABLE paiement CHANGE montant montant DOUBLE PRECISION NOT NULL, CHANGE paiement_inscription_id inscription_id INT NOT NULL');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E5DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E5DAC5993 ON paiement (inscription_id)');
    }
}
