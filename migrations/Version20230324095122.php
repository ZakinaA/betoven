<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324095122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE cours ADD periodicite SMALLINT NOT NULL, CHANGE date date DATE NOT NULL');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE professeur DROP FOREIGN KEY FK_17A55299F2C56620');
        $this->addSql('DROP TABLE couter');
        $this->addSql('DROP TABLE professeur');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('DROP TABLE tranches');
        $this->addSql('DROP TABLE type_cours');
        $this->addSql('ALTER TABLE cours DROP periodicite, CHANGE date date DATE DEFAULT \'CURRENT_TIMESTAMP\' NOT NULL');
        $this->addSql('ALTER TABLE marque CHANGE logo logo VARCHAR(100) DEFAULT NULL');
    }
}
