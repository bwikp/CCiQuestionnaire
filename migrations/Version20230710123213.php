<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230710123213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dernier_emploi_stage ADD dossier_id_id INT NOT NULL, CHANGE annee annee DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE dernier_emploi_stage ADD CONSTRAINT FK_FCF378F9B6C48410 FOREIGN KEY (dossier_id_id) REFERENCES dossier (id)');
        $this->addSql('CREATE INDEX IDX_FCF378F9B6C48410 ON dernier_emploi_stage (dossier_id_id)');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E037D233E95C');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E037E3AAC3C1');
        $this->addSql('DROP INDEX IDX_3D48E037E3AAC3C1 ON dossier');
        $this->addSql('DROP INDEX IDX_3D48E037D233E95C ON dossier');
        $this->addSql('ALTER TABLE dossier ADD dernier_emploi_stage_id INT DEFAULT NULL, DROP resultat_id, DROP dernieremploi_id');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E0371F06DDCB FOREIGN KEY (dernier_emploi_stage_id) REFERENCES dossier (id)');
        $this->addSql('CREATE INDEX IDX_3D48E0371F06DDCB ON dossier (dernier_emploi_stage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dernier_emploi_stage DROP FOREIGN KEY FK_FCF378F9B6C48410');
        $this->addSql('DROP INDEX IDX_FCF378F9B6C48410 ON dernier_emploi_stage');
        $this->addSql('ALTER TABLE dernier_emploi_stage DROP dossier_id_id, CHANGE annee annee DATE NOT NULL');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E0371F06DDCB');
        $this->addSql('DROP INDEX IDX_3D48E0371F06DDCB ON dossier');
        $this->addSql('ALTER TABLE dossier ADD dernieremploi_id INT DEFAULT NULL, CHANGE dernier_emploi_stage_id resultat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E037D233E95C FOREIGN KEY (resultat_id) REFERENCES resultat (id)');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E037E3AAC3C1 FOREIGN KEY (dernieremploi_id) REFERENCES dernier_emploi_stage (id)');
        $this->addSql('CREATE INDEX IDX_3D48E037E3AAC3C1 ON dossier (dernieremploi_id)');
        $this->addSql('CREATE INDEX IDX_3D48E037D233E95C ON dossier (resultat_id)');
    }
}
