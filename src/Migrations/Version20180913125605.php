<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180913125605 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cart_item_product (cart_item_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_AE98B090E9B59A59 (cart_item_id), INDEX IDX_AE98B0904584665A (product_id), PRIMARY KEY(cart_item_id, product_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cart_item_product ADD CONSTRAINT FK_AE98B090E9B59A59 FOREIGN KEY (cart_item_id) REFERENCES cart_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_item_product ADD CONSTRAINT FK_AE98B0904584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_item DROP INDEX IDX_F0FE25271BE1FB52, ADD UNIQUE INDEX UNIQ_F0FE25271BE1FB52 (basket_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADF52FE1EF');
        $this->addSql('DROP INDEX IDX_D34A04ADF52FE1EF ON product');
        $this->addSql('ALTER TABLE product DROP cart_items_id, CHANGE description description VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE cart_item_product');
        $this->addSql('ALTER TABLE cart_item DROP INDEX UNIQ_F0FE25271BE1FB52, ADD INDEX IDX_F0FE25271BE1FB52 (basket_id)');
        $this->addSql('ALTER TABLE product ADD cart_items_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADF52FE1EF FOREIGN KEY (cart_items_id) REFERENCES cart_item (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADF52FE1EF ON product (cart_items_id)');
    }
}
