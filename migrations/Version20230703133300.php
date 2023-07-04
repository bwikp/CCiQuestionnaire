<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230703133300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, telephone_fixe VARCHAR(255) NOT NULL, telephone_portable VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dernier_emploi_stage (id INT AUTO_INCREMENT NOT NULL, dossier_id_id INT NOT NULL, annee DATE NOT NULL, duree VARCHAR(255) NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, poste_occupe VARCHAR(255) NOT NULL, INDEX IDX_FCF378F9B6C48410 (dossier_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE derniere_formation (id INT AUTO_INCREMENT NOT NULL, annee_scolaire DATE NOT NULL, classe_frequentee VARCHAR(255) NOT NULL, diplome_obtenu_ou_en_cours VARCHAR(255) NOT NULL, nom_localite_etablissement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossier (id INT AUTO_INCREMENT NOT NULL, resultat_id INT DEFAULT NULL, promos_formation_id INT NOT NULL, themformaquestions_id INT NOT NULL, candidat_id INT NOT NULL, derniereformation_id INT DEFAULT NULL, dernieremploi_id INT DEFAULT NULL, motivation_id INT DEFAULT NULL, formation_initiale VARCHAR(255) NOT NULL, experience_pro VARCHAR(255) NOT NULL, INDEX IDX_3D48E037D233E95C (resultat_id), INDEX IDX_3D48E0376C812072 (promos_formation_id), INDEX IDX_3D48E0376A0FE2E9 (themformaquestions_id), INDEX IDX_3D48E0378D0EB82 (candidat_id), INDEX IDX_3D48E03761CC4FC9 (derniereformation_id), INDEX IDX_3D48E037E3AAC3C1 (dernieremploi_id), INDEX IDX_3D48E0378EDBCD4E (motivation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, annee VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_candidat (id INT AUTO_INCREMENT NOT NULL, candidat_id INT NOT NULL, formation_id INT NOT NULL, INDEX IDX_AD27E3808D0EB82 (candidat_id), INDEX IDX_AD27E3805200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motivation (id INT AUTO_INCREMENT NOT NULL, projet_pro_et_motivation VARCHAR(255) NOT NULL, comprehension_sur_la_formation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promo_formation (id INT AUTO_INCREMENT NOT NULL, formation_id INT NOT NULL, promotion_id INT NOT NULL, INDEX IDX_688A46045200282E (formation_id), INDEX IDX_688A4604139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_corriger (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, detail LONGTEXT NOT NULL, reponse VARCHAR(255) NOT NULL, INDEX IDX_4D7F018AC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_qcm (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, choix1 VARCHAR(255) NOT NULL, detail_choix1 LONGTEXT NOT NULL, choix2 VARCHAR(255) NOT NULL, detail_choix2 LONGTEXT NOT NULL, choix3 VARCHAR(255) NOT NULL, detail_choix3 LONGTEXT NOT NULL, choix4 VARCHAR(255) NOT NULL, detail_choix4 LONGTEXT NOT NULL, reponse VARCHAR(255) NOT NULL, INDEX IDX_E7B51F8CC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_remplir (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, detail LONGTEXT NOT NULL, reponse VARCHAR(255) NOT NULL, INDEX IDX_F11AB452C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, detail LONGTEXT NOT NULL, image LONGBLOB NOT NULL, note NUMERIC(10, 0) NOT NULL, INDEX IDX_8ADC54D5C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_candidat (id INT AUTO_INCREMENT NOT NULL, questions_id INT NOT NULL, dossier_id INT NOT NULL, reponse_candidat VARCHAR(255) NOT NULL, note NUMERIC(10, 0) NOT NULL, INDEX IDX_35393B06BCB134CE (questions_id), INDEX IDX_35393B06611C0C56 (dossier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultat (id INT AUTO_INCREMENT NOT NULL, score_final NUMERIC(10, 2) DEFAULT NULL, is_admis TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE them_forma_questions (id INT AUTO_INCREMENT NOT NULL, questions_id INT NOT NULL, them_formations_id INT NOT NULL, categorie_id INT DEFAULT NULL, INDEX IDX_AB468401BCB134CE (questions_id), INDEX IDX_AB46840188187AC6 (them_formations_id), INDEX IDX_AB468401BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE them_formation (id INT AUTO_INCREMENT NOT NULL, formation_id INT NOT NULL, thematique_id INT NOT NULL, INDEX IDX_B36F64595200282E (formation_id), INDEX IDX_B36F6459476556AF (thematique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thematique (id INT AUTO_INCREMENT NOT NULL, duree NUMERIC(5, 0) DEFAULT NULL, nombre_question NUMERIC(5, 0) DEFAULT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_cci (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FCB5DAC5E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dernier_emploi_stage ADD CONSTRAINT FK_FCF378F9B6C48410 FOREIGN KEY (dossier_id_id) REFERENCES dossier (id)');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E037D233E95C FOREIGN KEY (resultat_id) REFERENCES resultat (id)');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E0376C812072 FOREIGN KEY (promos_formation_id) REFERENCES promo_formation (id)');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E0376A0FE2E9 FOREIGN KEY (themformaquestions_id) REFERENCES them_forma_questions (id)');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E0378D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E03761CC4FC9 FOREIGN KEY (derniereformation_id) REFERENCES derniere_formation (id)');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E037E3AAC3C1 FOREIGN KEY (dernieremploi_id) REFERENCES dernier_emploi_stage (id)');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E0378EDBCD4E FOREIGN KEY (motivation_id) REFERENCES motivation (id)');
        $this->addSql('ALTER TABLE formation_candidat ADD CONSTRAINT FK_AD27E3808D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE formation_candidat ADD CONSTRAINT FK_AD27E3805200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE promo_formation ADD CONSTRAINT FK_688A46045200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE promo_formation ADD CONSTRAINT FK_688A4604139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE question_corriger ADD CONSTRAINT FK_4D7F018AC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE question_qcm ADD CONSTRAINT FK_E7B51F8CC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE question_remplir ADD CONSTRAINT FK_F11AB452C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D5C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE reponse_candidat ADD CONSTRAINT FK_35393B06BCB134CE FOREIGN KEY (questions_id) REFERENCES questions (id)');
        $this->addSql('ALTER TABLE reponse_candidat ADD CONSTRAINT FK_35393B06611C0C56 FOREIGN KEY (dossier_id) REFERENCES dossier (id)');
        $this->addSql('ALTER TABLE them_forma_questions ADD CONSTRAINT FK_AB468401BCB134CE FOREIGN KEY (questions_id) REFERENCES questions (id)');
        $this->addSql('ALTER TABLE them_forma_questions ADD CONSTRAINT FK_AB46840188187AC6 FOREIGN KEY (them_formations_id) REFERENCES them_formation (id)');
        $this->addSql('ALTER TABLE them_forma_questions ADD CONSTRAINT FK_AB468401BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE them_formation ADD CONSTRAINT FK_B36F64595200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE them_formation ADD CONSTRAINT FK_B36F6459476556AF FOREIGN KEY (thematique_id) REFERENCES thematique (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dernier_emploi_stage DROP FOREIGN KEY FK_FCF378F9B6C48410');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E037D233E95C');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E0376C812072');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E0376A0FE2E9');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E0378D0EB82');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E03761CC4FC9');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E037E3AAC3C1');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E0378EDBCD4E');
        $this->addSql('ALTER TABLE formation_candidat DROP FOREIGN KEY FK_AD27E3808D0EB82');
        $this->addSql('ALTER TABLE formation_candidat DROP FOREIGN KEY FK_AD27E3805200282E');
        $this->addSql('ALTER TABLE promo_formation DROP FOREIGN KEY FK_688A46045200282E');
        $this->addSql('ALTER TABLE promo_formation DROP FOREIGN KEY FK_688A4604139DF194');
        $this->addSql('ALTER TABLE question_corriger DROP FOREIGN KEY FK_4D7F018AC54C8C93');
        $this->addSql('ALTER TABLE question_qcm DROP FOREIGN KEY FK_E7B51F8CC54C8C93');
        $this->addSql('ALTER TABLE question_remplir DROP FOREIGN KEY FK_F11AB452C54C8C93');
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D5C54C8C93');
        $this->addSql('ALTER TABLE reponse_candidat DROP FOREIGN KEY FK_35393B06BCB134CE');
        $this->addSql('ALTER TABLE reponse_candidat DROP FOREIGN KEY FK_35393B06611C0C56');
        $this->addSql('ALTER TABLE them_forma_questions DROP FOREIGN KEY FK_AB468401BCB134CE');
        $this->addSql('ALTER TABLE them_forma_questions DROP FOREIGN KEY FK_AB46840188187AC6');
        $this->addSql('ALTER TABLE them_forma_questions DROP FOREIGN KEY FK_AB468401BCF5E72D');
        $this->addSql('ALTER TABLE them_formation DROP FOREIGN KEY FK_B36F64595200282E');
        $this->addSql('ALTER TABLE them_formation DROP FOREIGN KEY FK_B36F6459476556AF');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE dernier_emploi_stage');
        $this->addSql('DROP TABLE derniere_formation');
        $this->addSql('DROP TABLE dossier');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_candidat');
        $this->addSql('DROP TABLE motivation');
        $this->addSql('DROP TABLE promo_formation');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE question_corriger');
        $this->addSql('DROP TABLE question_qcm');
        $this->addSql('DROP TABLE question_remplir');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE reponse_candidat');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('DROP TABLE them_forma_questions');
        $this->addSql('DROP TABLE them_formation');
        $this->addSql('DROP TABLE thematique');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE users_cci');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
