<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211026181656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE delivery_drink (id INT AUTO_INCREMENT NOT NULL, delivery_kit_id INT DEFAULT NULL, drink_name VARCHAR(255) NOT NULL, drink_price INT NOT NULL, drink_composition VARCHAR(255) DEFAULT NULL, INDEX IDX_1DB5A643249F9961 (delivery_kit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_kit (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_order (id INT AUTO_INCREMENT NOT NULL, order_kit_id INT DEFAULT NULL, order_pizza_id INT DEFAULT NULL, order_drink_id INT DEFAULT NULL, order_roll_id INT DEFAULT NULL, order_address VARCHAR(255) NOT NULL, order_total_price INT NOT NULL, INDEX IDX_E522750AF901703A (order_kit_id), INDEX IDX_E522750A35E5FFF3 (order_pizza_id), INDEX IDX_E522750AD752A905 (order_drink_id), INDEX IDX_E522750A5D71C46D (order_roll_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_pizza (id INT AUTO_INCREMENT NOT NULL, delivery_kit_id INT DEFAULT NULL, pizza_name VARCHAR(255) NOT NULL, pizza_price INT NOT NULL, pizza_composition VARCHAR(255) DEFAULT NULL, INDEX IDX_DFD664FD249F9961 (delivery_kit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_pizza_in_kit (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_roll (id INT AUTO_INCREMENT NOT NULL, delivery_kit_id INT DEFAULT NULL, roll_name VARCHAR(255) NOT NULL, roll_price INT NOT NULL, roll_composition VARCHAR(255) DEFAULT NULL, INDEX IDX_FF29FA54249F9961 (delivery_kit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE delivery_drink ADD CONSTRAINT FK_1DB5A643249F9961 FOREIGN KEY (delivery_kit_id) REFERENCES delivery_kit (id)');
        $this->addSql('ALTER TABLE delivery_order ADD CONSTRAINT FK_E522750AF901703A FOREIGN KEY (order_kit_id) REFERENCES delivery_kit (id)');
        $this->addSql('ALTER TABLE delivery_order ADD CONSTRAINT FK_E522750A35E5FFF3 FOREIGN KEY (order_pizza_id) REFERENCES delivery_pizza (id)');
        $this->addSql('ALTER TABLE delivery_order ADD CONSTRAINT FK_E522750AD752A905 FOREIGN KEY (order_drink_id) REFERENCES delivery_drink (id)');
        $this->addSql('ALTER TABLE delivery_order ADD CONSTRAINT FK_E522750A5D71C46D FOREIGN KEY (order_roll_id) REFERENCES delivery_roll (id)');
        $this->addSql('ALTER TABLE delivery_pizza ADD CONSTRAINT FK_DFD664FD249F9961 FOREIGN KEY (delivery_kit_id) REFERENCES delivery_kit (id)');
        $this->addSql('ALTER TABLE delivery_roll ADD CONSTRAINT FK_FF29FA54249F9961 FOREIGN KEY (delivery_kit_id) REFERENCES delivery_kit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery_order DROP FOREIGN KEY FK_E522750AD752A905');
        $this->addSql('ALTER TABLE delivery_drink DROP FOREIGN KEY FK_1DB5A643249F9961');
        $this->addSql('ALTER TABLE delivery_order DROP FOREIGN KEY FK_E522750AF901703A');
        $this->addSql('ALTER TABLE delivery_pizza DROP FOREIGN KEY FK_DFD664FD249F9961');
        $this->addSql('ALTER TABLE delivery_roll DROP FOREIGN KEY FK_FF29FA54249F9961');
        $this->addSql('ALTER TABLE delivery_order DROP FOREIGN KEY FK_E522750A35E5FFF3');
        $this->addSql('ALTER TABLE delivery_order DROP FOREIGN KEY FK_E522750A5D71C46D');
        $this->addSql('DROP TABLE delivery_drink');
        $this->addSql('DROP TABLE delivery_kit');
        $this->addSql('DROP TABLE delivery_order');
        $this->addSql('DROP TABLE delivery_pizza');
        $this->addSql('DROP TABLE delivery_pizza_in_kit');
        $this->addSql('DROP TABLE delivery_roll');
    }
}
