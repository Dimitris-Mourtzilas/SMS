<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512094058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course ADD professors_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB911B5B6FA FOREIGN KEY (professors_id) REFERENCES professor (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB911B5B6FA ON course (professors_id)');
        $this->addSql('ALTER TABLE professor DROP FOREIGN KEY FK_790DD7E3591CC992');
        $this->addSql('DROP INDEX IDX_790DD7E3591CC992 ON professor');
        $this->addSql('ALTER TABLE professor DROP course_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB911B5B6FA');
        $this->addSql('DROP INDEX IDX_169E6FB911B5B6FA ON course');
        $this->addSql('ALTER TABLE course DROP professors_id');
        $this->addSql('ALTER TABLE professor ADD course_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE professor ADD CONSTRAINT FK_790DD7E3591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_790DD7E3591CC992 ON professor (course_id)');
    }
}
