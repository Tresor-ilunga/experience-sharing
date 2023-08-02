<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230513193043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'add link and link visit and value objects';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE link (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', url VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, click_count INT DEFAULT 0 NOT NULL, unique_visit_count INT DEFAULT 0 NOT NULL, total_visit_count INT DEFAULT 0 NOT NULL, has_automatic_redirect TINYINT(1) DEFAULT 0 NOT NULL, redirect_delay INT DEFAULT 5 NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', meta_title VARCHAR(255) DEFAULT NULL, meta_description LONGTEXT DEFAULT NULL, meta_canonical_url VARCHAR(255) DEFAULT NULL, meta_image LONGTEXT DEFAULT NULL, meta_favicon LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_36AC99F1F47645AE989D9B62 (url, slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link_visit (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', link_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', ip VARCHAR(255) DEFAULT NULL, referer VARCHAR(255) DEFAULT NULL, user_agent VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', location_time_zone VARCHAR(255) DEFAULT NULL, location_longitude DOUBLE PRECISION DEFAULT NULL, location_latitude DOUBLE PRECISION DEFAULT NULL, location_accuracy_radius INT DEFAULT NULL, device_operating_system VARCHAR(255) DEFAULT NULL, device_client VARCHAR(255) DEFAULT NULL, device_device VARCHAR(255) DEFAULT NULL, device_is_bot TINYINT(1) DEFAULT 0 NOT NULL, INDEX IDX_ECC5B5E7ADA40271 (link_id), UNIQUE INDEX UNIQ_ECC5B5E7A5E3B32DADA40271 (ip, link_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE link_visit ADD CONSTRAINT FK_ECC5B5E7ADA40271 FOREIGN KEY (link_id) REFERENCES link (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE link_visit DROP FOREIGN KEY FK_ECC5B5E7ADA40271');
        $this->addSql('DROP TABLE link');
        $this->addSql('DROP TABLE link_visit');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
