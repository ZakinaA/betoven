<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221121094658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat_pret (id INT AUTO_INCREMENT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, attestation_assurance VARCHAR(255) NOT NULL, etat_detaille_debut VARCHAR(255) NOT NULL, etat_detaille_retour VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inter_pret (id INT AUTO_INCREMENT NOT NULL, intervention_id INT DEFAULT NULL, contrat_pret_id INT DEFAULT NULL, quotite INT NOT NULL, INDEX IDX_244C23678EAE3863 (intervention_id), INDEX IDX_244C2367B2AF233D (contrat_pret_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, professionnel_id INT DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, descriptif VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_D11814AB8A49CC82 (professionnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE metier (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE metier_professionnel (metier_id INT NOT NULL, professionnel_id INT NOT NULL, INDEX IDX_FA14296CED16FA20 (metier_id), INDEX IDX_FA14296C8A49CC82 (professionnel_id), PRIMARY KEY(metier_id, professionnel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professionnel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, num_rue VARCHAR(255) NOT NULL, rue VARCHAR(255) NOT NULL, copos VARCHAR(6) NOT NULL, ville VARCHAR(255) NOT NULL, tel VARCHAR(10) NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inter_pret ADD CONSTRAINT FK_244C23678EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
        $this->addSql('ALTER TABLE inter_pret ADD CONSTRAINT FK_244C2367B2AF233D FOREIGN KEY (contrat_pret_id) REFERENCES contrat_pret (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB8A49CC82 FOREIGN KEY (professionnel_id) REFERENCES professionnel (id)');
        $this->addSql('ALTER TABLE metier_professionnel ADD CONSTRAINT FK_FA14296CED16FA20 FOREIGN KEY (metier_id) REFERENCES metier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE metier_professionnel ADD CONSTRAINT FK_FA14296C8A49CC82 FOREIGN KEY (professionnel_id) REFERENCES professionnel (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inter_pret DROP FOREIGN KEY FK_244C23678EAE3863');
        $this->addSql('ALTER TABLE inter_pret DROP FOREIGN KEY FK_244C2367B2AF233D');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB8A49CC82');
        $this->addSql('ALTER TABLE metier_professionnel DROP FOREIGN KEY FK_FA14296CED16FA20');
        $this->addSql('ALTER TABLE metier_professionnel DROP FOREIGN KEY FK_FA14296C8A49CC82');
        $this->addSql('DROP TABLE contrat_pret');
        $this->addSql('DROP TABLE inter_pret');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE metier');
        $this->addSql('DROP TABLE metier_professionnel');
        $this->addSql('DROP TABLE professionnel');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
