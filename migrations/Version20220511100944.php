<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511100944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(25) NOT NULL, ects SMALLINT NOT NULL, semester VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enrolled (id INT AUTO_INCREMENT NOT NULL, enrollment_date VARCHAR(255) NOT NULL, semester VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enrolled_student (enrolled_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_C5F2951C1D028BEA (enrolled_id), INDEX IDX_C5F2951CCB944F1A (student_id), PRIMARY KEY(enrolled_id, student_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enrolled_course (enrolled_id INT NOT NULL, course_id INT NOT NULL, INDEX IDX_C0C3C57F1D028BEA (enrolled_id), INDEX IDX_C0C3C57F591CC992 (course_id), PRIMARY KEY(enrolled_id, course_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professor (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, salary DOUBLE PRECISION NOT NULL, INDEX IDX_790DD7E3591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, gpa DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enrolled_student ADD CONSTRAINT FK_C5F2951C1D028BEA FOREIGN KEY (enrolled_id) REFERENCES enrolled (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enrolled_student ADD CONSTRAINT FK_C5F2951CCB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enrolled_course ADD CONSTRAINT FK_C0C3C57F1D028BEA FOREIGN KEY (enrolled_id) REFERENCES enrolled (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enrolled_course ADD CONSTRAINT FK_C0C3C57F591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professor ADD CONSTRAINT FK_790DD7E3591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enrolled_course DROP FOREIGN KEY FK_C0C3C57F591CC992');
        $this->addSql('ALTER TABLE professor DROP FOREIGN KEY FK_790DD7E3591CC992');
        $this->addSql('ALTER TABLE enrolled_student DROP FOREIGN KEY FK_C5F2951C1D028BEA');
        $this->addSql('ALTER TABLE enrolled_course DROP FOREIGN KEY FK_C0C3C57F1D028BEA');
        $this->addSql('ALTER TABLE enrolled_student DROP FOREIGN KEY FK_C5F2951CCB944F1A');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE enrolled');
        $this->addSql('DROP TABLE enrolled_student');
        $this->addSql('DROP TABLE enrolled_course');
        $this->addSql('DROP TABLE professor');
        $this->addSql('DROP TABLE student');
    }
}
