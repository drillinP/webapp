<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623212709 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA webapp');
        $this->addSql('CREATE SEQUENCE "webapp"."maps_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "webapp"."maps" (id INT NOT NULL, created_by_id INT NOT NULL, name TEXT NOT NULL, title TEXT DEFAULT NULL, description TEXT DEFAULT NULL, created_at DATE DEFAULT \'NOW()\' NOT NULL, updated_at DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1A55AB99B03A8386 ON "webapp"."maps" (created_by_id)');
        $this->addSql('ALTER TABLE "webapp"."maps" ADD CONSTRAINT FK_1A55AB99B03A8386 FOREIGN KEY (created_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SCHEMA data');
        $this->addSql('DROP SEQUENCE "webapp"."maps_id_seq" CASCADE');
        $this->addSql('DROP TABLE "webapp"."maps"');
    }
}
