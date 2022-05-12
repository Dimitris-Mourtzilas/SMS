<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512102500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB911B5B6FA');
        $this->addSql('DROP INDEX IDX_169E6FB911B5B6FA ON course');
        $this->addSql('ALTER TABLE course CHANGE professors_id professor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB97D2D84D5 FOREIGN KEY (professor_id) REFERENCES professor (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB97D2D84D5 ON course (professor_id)');
        $this->addSql('ALTER TABLE professor ADD first_name VARCHAR(25) NOT NULL, ADD last_name VARCHAR(25) NOT NULL, ADD nick_name VARCHAR(10) NOT NULL, ADD password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE student ADD first_name VARCHAR(25) NOT NULL, ADD last_name VARCHAR(25) NOT NULL, ADD nick_name VARCHAR(10) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD age INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB97D2D84D5');
        $this->addSql('DROP INDEX IDX_169E6FB97D2D84D5 ON course');
        $this->addSql('ALTER TABLE course CHANGE professor_id professors_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB911B5B6FA FOREIGN KEY (professors_id) REFERENCES professor (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB911B5B6FA ON course (professors_id)');
        $this->addSql('ALTER TABLE professor DROP first_name, DROP last_name, DROP nick_name, DROP password');
        $this->addSql('ALTER TABLE student DROP first_name, DROP last_name, DROP nick_name, DROP password, DROP age');
    }
}
