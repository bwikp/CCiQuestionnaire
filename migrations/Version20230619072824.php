<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230619072824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, telephone_fixe VARCHAR(255) NOT NULL, telephone_portable VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix (id INT AUTO_INCREMENT NOT NULL, question_qcm_id INT NOT NULL, choix VARCHAR(255) NOT NULL, detail VARCHAR(255) NOT NULL, reponse SMALLINT NOT NULL, INDEX IDX_4F488091F83F6EAE (question_qcm_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dernier_emploi_stage (id INT AUTO_INCREMENT NOT NULL, candidat_id INT NOT NULL, annee DATE NOT NULL, duree VARCHAR(255) NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, poste_occupe VARCHAR(255) NOT NULL, INDEX IDX_FCF378F98D0EB82 (candidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE derniere_formation (id INT AUTO_INCREMENT NOT NULL, candidat_id INT NOT NULL, annee_scolaire DATE NOT NULL, classe_frequentee VARCHAR(255) NOT NULL, diplome_obtenu_ou_en_cours VARCHAR(255) NOT NULL, nom_localite_etablissement VARCHAR(255) NOT NULL, INDEX IDX_CD4B74948D0EB82 (candidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossier (id INT AUTO_INCREMENT NOT NULL, formation_initiale VARCHAR(255) NOT NULL, experience_pro VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, annee VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_candidat (id INT AUTO_INCREMENT NOT NULL, candidat_id INT NOT NULL, INDEX IDX_AD27E3808D0EB82 (candidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motivation (id INT AUTO_INCREMENT NOT NULL, candidat_id INT NOT NULL, projet_pro_et_motivation VARCHAR(255) NOT NULL, comprehension_sur_la_formation VARCHAR(255) NOT NULL, INDEX IDX_E06073ED8D0EB82 (candidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promo_formation (id INT AUTO_INCREMENT NOT NULL, formation_id INT NOT NULL, promotion_id INT NOT NULL, INDEX IDX_688A46045200282E (formation_id), INDEX IDX_688A4604139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_completer (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, detail LONGTEXT NOT NULL, reponse VARCHAR(255) NOT NULL, INDEX IDX_C7F9ADA4C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_corriger (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, detail LONGTEXT NOT NULL, reponse VARCHAR(255) NOT NULL, INDEX IDX_4D7F018AC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_qcm (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, detail VARCHAR(255) NOT NULL, INDEX IDX_E7B51F8CC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, detail LONGTEXT NOT NULL, image LONGBLOB NOT NULL, note NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_candidat (id INT AUTO_INCREMENT NOT NULL, reponse_candidat VARCHAR(255) NOT NULL, note NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultat (id INT AUTO_INCREMENT NOT NULL, score_final NUMERIC(10, 0) NOT NULL, is_admis TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE them_forma_questions (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE them_formation (id INT AUTO_INCREMENT NOT NULL, formation_id INT NOT NULL, thematique_id INT NOT NULL, INDEX IDX_B36F64595200282E (formation_id), INDEX IDX_B36F6459476556AF (thematique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thematique (id INT AUTO_INCREMENT NOT NULL, duree NUMERIC(5, 0) DEFAULT NULL, nombre_question NUMERIC(5, 0) DEFAULT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_cci (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FCB5DAC5E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choix ADD CONSTRAINT FK_4F488091F83F6EAE FOREIGN KEY (question_qcm_id) REFERENCES question_qcm (id)');
        $this->addSql('ALTER TABLE dernier_emploi_stage ADD CONSTRAINT FK_FCF378F98D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE derniere_formation ADD CONSTRAINT FK_CD4B74948D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE formation_candidat ADD CONSTRAINT FK_AD27E3808D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE motivation ADD CONSTRAINT FK_E06073ED8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE promo_formation ADD CONSTRAINT FK_688A46045200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE promo_formation ADD CONSTRAINT FK_688A4604139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE question_completer ADD CONSTRAINT FK_C7F9ADA4C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE question_corriger ADD CONSTRAINT FK_4D7F018AC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE question_qcm ADD CONSTRAINT FK_E7B51F8CC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE them_formation ADD CONSTRAINT FK_B36F64595200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE them_formation ADD CONSTRAINT FK_B36F6459476556AF FOREIGN KEY (thematique_id) REFERENCES thematique (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choix DROP FOREIGN KEY FK_4F488091F83F6EAE');
        $this->addSql('ALTER TABLE dernier_emploi_stage DROP FOREIGN KEY FK_FCF378F98D0EB82');
        $this->addSql('ALTER TABLE derniere_formation DROP FOREIGN KEY FK_CD4B74948D0EB82');
        $this->addSql('ALTER TABLE formation_candidat DROP FOREIGN KEY FK_AD27E3808D0EB82');
        $this->addSql('ALTER TABLE motivation DROP FOREIGN KEY FK_E06073ED8D0EB82');
        $this->addSql('ALTER TABLE promo_formation DROP FOREIGN KEY FK_688A46045200282E');
        $this->addSql('ALTER TABLE promo_formation DROP FOREIGN KEY FK_688A4604139DF194');
        $this->addSql('ALTER TABLE question_completer DROP FOREIGN KEY FK_C7F9ADA4C54C8C93');
        $this->addSql('ALTER TABLE question_corriger DROP FOREIGN KEY FK_4D7F018AC54C8C93');
        $this->addSql('ALTER TABLE question_qcm DROP FOREIGN KEY FK_E7B51F8CC54C8C93');
        $this->addSql('ALTER TABLE them_formation DROP FOREIGN KEY FK_B36F64595200282E');
        $this->addSql('ALTER TABLE them_formation DROP FOREIGN KEY FK_B36F6459476556AF');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE choix');
        $this->addSql('DROP TABLE dernier_emploi_stage');
        $this->addSql('DROP TABLE derniere_formation');
        $this->addSql('DROP TABLE dossier');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_candidat');
        $this->addSql('DROP TABLE motivation');
        $this->addSql('DROP TABLE promo_formation');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE question_completer');
        $this->addSql('DROP TABLE question_corriger');
        $this->addSql('DROP TABLE question_qcm');
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
