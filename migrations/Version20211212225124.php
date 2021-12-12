<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211212225124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compteur (id INT AUTO_INCREMENT NOT NULL, numcom INT NOT NULL, numl VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lcommande (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, numc VARCHAR(50) NOT NULL, pv VARCHAR(50) NOT NULL, qte VARCHAR(50) NOT NULL, tva VARCHAR(50) NOT NULL, lig VARCHAR(50) NOT NULL, INDEX IDX_57961F0AF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, numl VARCHAR(50) NOT NULL, observation VARCHAR(50) NOT NULL, totht VARCHAR(50) NOT NULL, tottva VARCHAR(50) NOT NULL, totttc VARCHAR(50) NOT NULL, dateliv VARCHAR(50) NOT NULL, INDEX IDX_A60C9F1F19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE llivraison (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, numl VARCHAR(50) NOT NULL, pv VARCHAR(50) NOT NULL, qte VARCHAR(50) NOT NULL, tva VARCHAR(50) NOT NULL, lig INT NOT NULL, INDEX IDX_68540739F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail (id INT AUTO_INCREMENT NOT NULL, subject VARCHAR(50) NOT NULL, mail VARCHAR(50) NOT NULL, object VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lcommande ADD CONSTRAINT FK_57961F0AF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE llivraison ADD CONSTRAINT FK_68540739F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE commande ADD numc VARCHAR(50) NOT NULL, ADD totht VARCHAR(50) NOT NULL, ADD tottva VARCHAR(50) NOT NULL, ADD totttc VARCHAR(50) NOT NULL, DROP numero, CHANGE date_commande datecomm DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE compteur');
        $this->addSql('DROP TABLE lcommande');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE llivraison');
        $this->addSql('DROP TABLE mail');
        $this->addSql('ALTER TABLE commande ADD numero VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP numc, DROP totht, DROP tottva, DROP totttc, CHANGE datecomm date_commande DATE NOT NULL');
    }
}
