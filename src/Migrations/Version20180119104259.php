<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180119104259 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE basket DROP FOREIGN KEY FK_2246507B43A7B604');
        $this->addSql('DROP INDEX IDX_2246507B43A7B604 ON basket');
        $this->addSql('ALTER TABLE basket CHANGE carte_item_id cart_item_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE basket ADD CONSTRAINT FK_2246507BE9B59A59 FOREIGN KEY (cart_item_id) REFERENCES cart_item (id)');
        $this->addSql('CREATE INDEX IDX_2246507BE9B59A59 ON basket (cart_item_id)');
        $this->addSql('ALTER TABLE category CHANGE lib_cat lib VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE cart_item ADD lib VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE basket DROP FOREIGN KEY FK_2246507BE9B59A59');
        $this->addSql('DROP INDEX IDX_2246507BE9B59A59 ON basket');
        $this->addSql('ALTER TABLE basket CHANGE cart_item_id carte_item_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE basket ADD CONSTRAINT FK_2246507B43A7B604 FOREIGN KEY (carte_item_id) REFERENCES cart_item (id)');
        $this->addSql('CREATE INDEX IDX_2246507B43A7B604 ON basket (carte_item_id)');
        $this->addSql('ALTER TABLE cart_item DROP lib');
        $this->addSql('ALTER TABLE category CHANGE lib lib_cat VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci');
    }
}
