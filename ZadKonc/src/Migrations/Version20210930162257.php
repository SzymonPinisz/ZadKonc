<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210930162257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE app_colorproperty');
        $this->addSql('ALTER TABLE app_color CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B085C524665648E9 ON app_color (color)');
        $this->addSql('ALTER TABLE sylius_product DROP FOREIGN KEY FK_677B9B74924B585A');
        $this->addSql('DROP INDEX IDX_677B9B74924B585A ON sylius_product');
        $this->addSql('ALTER TABLE sylius_product CHANGE colorproperty_id color_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product ADD CONSTRAINT FK_677B9B747ADA1FB5 FOREIGN KEY (color_id) REFERENCES app_color (id)');
        $this->addSql('CREATE INDEX IDX_677B9B747ADA1FB5 ON sylius_product (color_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_colorproperty (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_36514D21665648E9 (color), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP INDEX UNIQ_B085C524665648E9 ON app_color');
        $this->addSql('ALTER TABLE app_color CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_product DROP FOREIGN KEY FK_677B9B747ADA1FB5');
        $this->addSql('DROP INDEX IDX_677B9B747ADA1FB5 ON sylius_product');
        $this->addSql('ALTER TABLE sylius_product CHANGE color_id colorproperty_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product ADD CONSTRAINT FK_677B9B74924B585A FOREIGN KEY (colorproperty_id) REFERENCES app_color (id)');
        $this->addSql('CREATE INDEX IDX_677B9B74924B585A ON sylius_product (colorproperty_id)');
    }
}
