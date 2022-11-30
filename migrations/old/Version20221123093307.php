<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221123093307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       // $this->addSql('ALTER TABLE cours_tranche DROP FOREIGN KEY FK_2561313B7ECF78B0');
        //$this->addSql('ALTER TABLE cours_tranche DROP FOREIGN KEY FK_2561313BB76F6B31');
        //$this->addSql('ALTER TABLE cours_jour DROP FOREIGN KEY FK_961E62A7ECF78B0');
        //$this->addSql('ALTER TABLE cours_jour DROP FOREIGN KEY FK_961E62A220C6AD0');
        //$this->addSql('DROP TABLE cours_tranche');
        //$this->addSql('DROP TABLE cours_jour');
        //$this->addSql('DROP TABLE jour');
        //$this->addSql('ALTER TABLE compte DROP rue');
        //$this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6B7942F03');
        //$this->addSql('DROP INDEX IDX_5E90F6D6B7942F03 ON inscription');
        //$this->addSql('ALTER TABLE inscription DROP cour_id');
        //$this->addSql('ALTER TABLE instrument ADD type_intrument_id INT DEFAULT NULL, ADD marque_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DD678F9781 FOREIGN KEY (type_intrument_id) REFERENCES type_instrument (id)');
        //$this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DD4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        //$this->addSql('CREATE INDEX IDX_3CBF69DD678F9781 ON instrument (type_intrument_id)');
        //$this->addSql('CREATE INDEX IDX_3CBF69DD4827B9B2 ON instrument (marque_id)');
        //$this->addSql('ALTER TABLE tarif DROP FOREIGN KEY FK_E7189C9B76F6B31');
        //$this->addSql('DROP INDEX IDX_E7189C9B76F6B31 ON tarif');
        //$this->addSql('ALTER TABLE tarif DROP tranche_id');
        //$this->addSql('ALTER TABLE type_instrument ADD classe_intrument_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE type_instrument ADD CONSTRAINT FK_21BCBFF841B1A738 FOREIGN KEY (classe_intrument_id) REFERENCES classe_instrument (id)');
        //$this->addSql('CREATE INDEX IDX_21BCBFF841B1A738 ON type_instrument (classe_intrument_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cours_tranche (cours_id INT NOT NULL, tranche_id INT NOT NULL, INDEX IDX_2561313B7ECF78B0 (cours_id), INDEX IDX_2561313BB76F6B31 (tranche_id), PRIMARY KEY(cours_id, tranche_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cours_jour (cours_id INT NOT NULL, jour_id INT NOT NULL, INDEX IDX_961E62A220C6AD0 (jour_id), INDEX IDX_961E62A7ECF78B0 (cours_id), PRIMARY KEY(cours_id, jour_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE jour (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cours_tranche ADD CONSTRAINT FK_2561313B7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours_tranche ADD CONSTRAINT FK_2561313BB76F6B31 FOREIGN KEY (tranche_id) REFERENCES tranche (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours_jour ADD CONSTRAINT FK_961E62A7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours_jour ADD CONSTRAINT FK_961E62A220C6AD0 FOREIGN KEY (jour_id) REFERENCES jour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tarif ADD tranche_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tarif ADD CONSTRAINT FK_E7189C9B76F6B31 FOREIGN KEY (tranche_id) REFERENCES tranche (id)');
        $this->addSql('CREATE INDEX IDX_E7189C9B76F6B31 ON tarif (tranche_id)');
        $this->addSql('ALTER TABLE inscription ADD cour_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6B7942F03 FOREIGN KEY (cour_id) REFERENCES cours (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6B7942F03 ON inscription (cour_id)');
        $this->addSql('ALTER TABLE compte ADD rue VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE type_instrument DROP FOREIGN KEY FK_21BCBFF841B1A738');
        $this->addSql('DROP INDEX IDX_21BCBFF841B1A738 ON type_instrument');
        $this->addSql('ALTER TABLE type_instrument DROP classe_intrument_id');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DD678F9781');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DD4827B9B2');
        $this->addSql('DROP INDEX IDX_3CBF69DD678F9781 ON instrument');
        $this->addSql('DROP INDEX IDX_3CBF69DD4827B9B2 ON instrument');
        $this->addSql('ALTER TABLE instrument DROP type_intrument_id, DROP marque_id');
    }
}
