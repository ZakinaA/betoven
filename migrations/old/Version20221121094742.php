<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221121094742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE instrument_couleur (instrument_id INT NOT NULL, couleur_id INT NOT NULL, INDEX IDX_443EF844CF11D9C (instrument_id), INDEX IDX_443EF844C31BA576 (couleur_id), PRIMARY KEY(instrument_id, couleur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE instrument_couleur ADD CONSTRAINT FK_443EF844CF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE instrument_couleur ADD CONSTRAINT FK_443EF844C31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accessoire ADD instrument_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE accessoire ADD CONSTRAINT FK_8FD026ACF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        $this->addSql('CREATE INDEX IDX_8FD026ACF11D9C ON accessoire (instrument_id)');
        $this->addSql('ALTER TABLE instrument ADD marque_id INT DEFAULT NULL, ADD type_instrument_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DD4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DD7C1CAAA9 FOREIGN KEY (type_instrument_id) REFERENCES type_instrument (id)');
        $this->addSql('CREATE INDEX IDX_3CBF69DD4827B9B2 ON instrument (marque_id)');
        $this->addSql('CREATE INDEX IDX_3CBF69DD7C1CAAA9 ON instrument (type_instrument_id)');
        $this->addSql('ALTER TABLE type_instrument ADD classe_instrument_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_instrument ADD CONSTRAINT FK_21BCBFF8CE879FB1 FOREIGN KEY (classe_instrument_id) REFERENCES classe_instrument (id)');
        $this->addSql('CREATE INDEX IDX_21BCBFF8CE879FB1 ON type_instrument (classe_instrument_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE instrument_couleur DROP FOREIGN KEY FK_443EF844CF11D9C');
        $this->addSql('ALTER TABLE instrument_couleur DROP FOREIGN KEY FK_443EF844C31BA576');
        $this->addSql('DROP TABLE instrument_couleur');
        $this->addSql('ALTER TABLE accessoire DROP FOREIGN KEY FK_8FD026ACF11D9C');
        $this->addSql('DROP INDEX IDX_8FD026ACF11D9C ON accessoire');
        $this->addSql('ALTER TABLE accessoire DROP instrument_id');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DD4827B9B2');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DD7C1CAAA9');
        $this->addSql('DROP INDEX IDX_3CBF69DD4827B9B2 ON instrument');
        $this->addSql('DROP INDEX IDX_3CBF69DD7C1CAAA9 ON instrument');
        $this->addSql('ALTER TABLE instrument DROP marque_id, DROP type_instrument_id');
        $this->addSql('ALTER TABLE type_instrument DROP FOREIGN KEY FK_21BCBFF8CE879FB1');
        $this->addSql('DROP INDEX IDX_21BCBFF8CE879FB1 ON type_instrument');
        $this->addSql('ALTER TABLE type_instrument DROP classe_instrument_id');
    }
}
