<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200925075526 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deal (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, price DOUBLE PRECISION NOT NULL, enable TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deal_category (deal_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_E5CB085BF60E2305 (deal_id), INDEX IDX_E5CB085B12469DE2 (category_id), PRIMARY KEY(deal_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE deal_category ADD CONSTRAINT FK_E5CB085BF60E2305 FOREIGN KEY (deal_id) REFERENCES deal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deal_category ADD CONSTRAINT FK_E5CB085B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE deal_category DROP FOREIGN KEY FK_E5CB085B12469DE2');
        $this->addSql('ALTER TABLE deal_category DROP FOREIGN KEY FK_E5CB085BF60E2305');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE deal');
        $this->addSql('DROP TABLE deal_category');
    }
}
