<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221121103647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jour (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD id_utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES eleve (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFF65260C6EE5C49 ON compte (id_utilisateur_id)');
        $this->addSql('ALTER TABLE cours ADD jour_id INT NOT NULL');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C220C6AD0 FOREIGN KEY (jour_id) REFERENCES jour (id)');
        $this->addSql('CREATE INDEX IDX_FDCA8C9C220C6AD0 ON cours (jour_id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D67ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D67ECF78B0 ON inscription (cours_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C220C6AD0');
        $this->addSql('DROP TABLE jour');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260C6EE5C49');
        $this->addSql('DROP INDEX UNIQ_CFF65260C6EE5C49 ON compte');
        $this->addSql('ALTER TABLE compte DROP id_utilisateur_id');
        $this->addSql('DROP INDEX IDX_FDCA8C9C220C6AD0 ON cours');
        $this->addSql('ALTER TABLE cours DROP jour_id');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D67ECF78B0');
        $this->addSql('DROP INDEX IDX_5E90F6D67ECF78B0 ON inscription');
    }
}
