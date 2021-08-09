<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210803131507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE budget (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, invoice_id INT DEFAULT NULL, code INT NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_73F2F77B19EB6921 (client_id), UNIQUE INDEX UNIQ_73F2F77B2989F1FD (invoice_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, nif VARCHAR(9) NOT NULL, uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', address VARCHAR(50) DEFAULT NULL, phone_number VARCHAR(9) DEFAULT NULL, phone_number2 VARCHAR(9) DEFAULT NULL, email VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE incidence (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, code INT NOT NULL, billing_period VARCHAR(30) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, payment_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_payed TINYINT(1) NOT NULL, payment_method VARCHAR(20) DEFAULT NULL, discount INT DEFAULT NULL, INDEX IDX_9065174419EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, invoice_id INT DEFAULT NULL, name VARCHAR(20) NOT NULL, description LONGTEXT NOT NULL, uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', email VARCHAR(50) DEFAULT NULL, started_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', finished_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_finished TINYINT(1) NOT NULL, image VARCHAR(255) DEFAULT NULL, wwb_address VARCHAR(255) DEFAULT NULL, is_online TINYINT(1) NOT NULL, INDEX IDX_2FB3D0EE19EB6921 (client_id), UNIQUE INDEX UNIQ_2FB3D0EE2989F1FD (invoice_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, description VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, code INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_budget (id INT AUTO_INCREMENT NOT NULL, service_id INT NOT NULL, budget_id INT DEFAULT NULL, INDEX IDX_4D35F24DED5CA9E6 (service_id), INDEX IDX_4D35F24D36ABA6B8 (budget_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_made (id INT AUTO_INCREMENT NOT NULL, service_id INT NOT NULL, invoice_id INT NOT NULL, description LONGTEXT NOT NULL, is_finished TINYINT(1) NOT NULL, working_time INT NOT NULL, INDEX IDX_6497DB99ED5CA9E6 (service_id), INDEX IDX_6497DB992989F1FD (invoice_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE budget ADD CONSTRAINT FK_73F2F77B19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE budget ADD CONSTRAINT FK_73F2F77B2989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_9065174419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE2989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id)');
        $this->addSql('ALTER TABLE service_budget ADD CONSTRAINT FK_4D35F24DED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE service_budget ADD CONSTRAINT FK_4D35F24D36ABA6B8 FOREIGN KEY (budget_id) REFERENCES budget (id)');
        $this->addSql('ALTER TABLE work_made ADD CONSTRAINT FK_6497DB99ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE work_made ADD CONSTRAINT FK_6497DB992989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service_budget DROP FOREIGN KEY FK_4D35F24D36ABA6B8');
        $this->addSql('ALTER TABLE budget DROP FOREIGN KEY FK_73F2F77B19EB6921');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_9065174419EB6921');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE19EB6921');
        $this->addSql('ALTER TABLE budget DROP FOREIGN KEY FK_73F2F77B2989F1FD');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE2989F1FD');
        $this->addSql('ALTER TABLE work_made DROP FOREIGN KEY FK_6497DB992989F1FD');
        $this->addSql('ALTER TABLE service_budget DROP FOREIGN KEY FK_4D35F24DED5CA9E6');
        $this->addSql('ALTER TABLE work_made DROP FOREIGN KEY FK_6497DB99ED5CA9E6');
        $this->addSql('DROP TABLE budget');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE incidence');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE service_budget');
        $this->addSql('DROP TABLE work_made');
    }
}
