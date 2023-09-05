<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220916145928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, object VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pdf ADD passeport VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE upload ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE upload ADD CONSTRAINT FK_17BDE61FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_17BDE61FA76ED395 ON upload (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE pdf DROP passeport');
        $this->addSql('ALTER TABLE upload DROP FOREIGN KEY FK_17BDE61FA76ED395');
        $this->addSql('DROP INDEX IDX_17BDE61FA76ED395 ON upload');
        $this->addSql('ALTER TABLE upload DROP user_id');
    }
}
