<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221205100407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accessoire (id INT AUTO_INCREMENT NOT NULL, instrument_id INT DEFAULT NULL, libelle VARCHAR(50) NOT NULL, INDEX IDX_8FD026ACF11D9C (instrument_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_instrument (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, num_rue VARCHAR(3) NOT NULL, copos VARCHAR(50) NOT NULL, ville VARCHAR(50) NOT NULL, tel VARCHAR(50) NOT NULL, mail VARCHAR(50) NOT NULL, mot_de_passe VARCHAR(70) NOT NULL, rue VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleur_instrument (couleur_id INT NOT NULL, instrument_id INT NOT NULL, INDEX IDX_2E62255DC31BA576 (couleur_id), INDEX IDX_2E62255DCF11D9C (instrument_id), PRIMARY KEY(couleur_id, instrument_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, professeur_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, age_mini INT NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, INDEX IDX_FDCA8C9CBAB22EE9 (professeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, compte_id INT NOT NULL, responsable_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_ECA105F7F2C56620 (compte_id), INDEX IDX_ECA105F753C59D72 (responsable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, eleve_id INT NOT NULL, cour_id INT NOT NULL, date_inscription DATE NOT NULL, INDEX IDX_5E90F6D6A6CC7B2 (eleve_id), INDEX IDX_5E90F6D6B7942F03 (cour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instrument (id INT AUTO_INCREMENT NOT NULL, type_intrument_id INT DEFAULT NULL, marque_id INT DEFAULT NULL, num_serie VARCHAR(10) NOT NULL, date_achat DATE NOT NULL, prix_achat VARCHAR(10) NOT NULL, INDEX IDX_3CBF69DD678F9781 (type_intrument_id), INDEX IDX_3CBF69DD4827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instrument_couleur (instrument_id INT NOT NULL, couleur_id INT NOT NULL, INDEX IDX_443EF844CF11D9C (instrument_id), INDEX IDX_443EF844C31BA576 (couleur_id), PRIMARY KEY(instrument_id, couleur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, inscription_id INT NOT NULL, montant DOUBLE PRECISION NOT NULL, date_paiement DATE NOT NULL, INDEX IDX_B1DC7A1E5DAC5993 (inscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pret_instrument (id INT AUTO_INCREMENT NOT NULL, eleve_id INT NOT NULL, instrument_id INT NOT NULL, date_pret DATE NOT NULL, INDEX IDX_DA6D552CA6CC7B2 (eleve_id), INDEX IDX_DA6D552CCF11D9C (instrument_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professeur_cours (id INT AUTO_INCREMENT NOT NULL, compte_id INT NOT NULL, UNIQUE INDEX UNIQ_6C94E7E2F2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_instrument (id INT AUTO_INCREMENT NOT NULL, classe_intrument_id INT DEFAULT NULL, libelle VARCHAR(20) NOT NULL, INDEX IDX_21BCBFF841B1A738 (classe_intrument_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accessoire ADD CONSTRAINT FK_8FD026ACF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        $this->addSql('ALTER TABLE couleur_instrument ADD CONSTRAINT FK_2E62255DC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE couleur_instrument ADD CONSTRAINT FK_2E62255DCF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CBAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur_cours (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F753C59D72 FOREIGN KEY (responsable_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6B7942F03 FOREIGN KEY (cour_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DD678F9781 FOREIGN KEY (type_intrument_id) REFERENCES type_instrument (id)');
        $this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DD4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE instrument_couleur ADD CONSTRAINT FK_443EF844CF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE instrument_couleur ADD CONSTRAINT FK_443EF844C31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E5DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE pret_instrument ADD CONSTRAINT FK_DA6D552CA6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE pret_instrument ADD CONSTRAINT FK_DA6D552CCF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        $this->addSql('ALTER TABLE professeur_cours ADD CONSTRAINT FK_6C94E7E2F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE type_instrument ADD CONSTRAINT FK_21BCBFF841B1A738 FOREIGN KEY (classe_intrument_id) REFERENCES classe_instrument (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accessoire DROP FOREIGN KEY FK_8FD026ACF11D9C');
        $this->addSql('ALTER TABLE couleur_instrument DROP FOREIGN KEY FK_2E62255DC31BA576');
        $this->addSql('ALTER TABLE couleur_instrument DROP FOREIGN KEY FK_2E62255DCF11D9C');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CBAB22EE9');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7F2C56620');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F753C59D72');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6A6CC7B2');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6B7942F03');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DD678F9781');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DD4827B9B2');
        $this->addSql('ALTER TABLE instrument_couleur DROP FOREIGN KEY FK_443EF844CF11D9C');
        $this->addSql('ALTER TABLE instrument_couleur DROP FOREIGN KEY FK_443EF844C31BA576');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1E5DAC5993');
        $this->addSql('ALTER TABLE pret_instrument DROP FOREIGN KEY FK_DA6D552CA6CC7B2');
        $this->addSql('ALTER TABLE pret_instrument DROP FOREIGN KEY FK_DA6D552CCF11D9C');
        $this->addSql('ALTER TABLE professeur_cours DROP FOREIGN KEY FK_6C94E7E2F2C56620');
        $this->addSql('ALTER TABLE type_instrument DROP FOREIGN KEY FK_21BCBFF841B1A738');
        $this->addSql('DROP TABLE accessoire');
        $this->addSql('DROP TABLE classe_instrument');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE couleur_instrument');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE instrument');
        $this->addSql('DROP TABLE instrument_couleur');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE pret_instrument');
        $this->addSql('DROP TABLE professeur_cours');
        $this->addSql('DROP TABLE type_instrument');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
