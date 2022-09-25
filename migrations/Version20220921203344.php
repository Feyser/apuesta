<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220921203344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ciudad (id INT AUTO_INCREMENT NOT NULL, pais_id INT NOT NULL, nombre VARCHAR(150) NOT NULL, INDEX IDX_8E86059EC604D5C6 (pais_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estadio (id INT AUTO_INCREMENT NOT NULL, ciudad_id INT NOT NULL, nombre VARCHAR(150) NOT NULL, INDEX IDX_6070DAE1E8608214 (ciudad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mundial (id INT AUTO_INCREMENT NOT NULL, sede_id INT NOT NULL, fecha_inicio DATE NOT NULL, fecha_fin DATE NOT NULL, descripcion VARCHAR(250) DEFAULT NULL, estado VARCHAR(4) NOT NULL, INDEX IDX_C140406BE19F41BF (sede_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pais (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paises_clasificados (id INT AUTO_INCREMENT NOT NULL, pais_id INT NOT NULL, mundial_id INT NOT NULL, participacion VARCHAR(4) NOT NULL, INDEX IDX_4460520FC604D5C6 (pais_id), INDEX IDX_4460520FA466EFA5 (mundial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ciudad ADD CONSTRAINT FK_8E86059EC604D5C6 FOREIGN KEY (pais_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE estadio ADD CONSTRAINT FK_6070DAE1E8608214 FOREIGN KEY (ciudad_id) REFERENCES ciudad (id)');
        $this->addSql('ALTER TABLE mundial ADD CONSTRAINT FK_C140406BE19F41BF FOREIGN KEY (sede_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE paises_clasificados ADD CONSTRAINT FK_4460520FC604D5C6 FOREIGN KEY (pais_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE paises_clasificados ADD CONSTRAINT FK_4460520FA466EFA5 FOREIGN KEY (mundial_id) REFERENCES mundial (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ciudad DROP FOREIGN KEY FK_8E86059EC604D5C6');
        $this->addSql('ALTER TABLE estadio DROP FOREIGN KEY FK_6070DAE1E8608214');
        $this->addSql('ALTER TABLE mundial DROP FOREIGN KEY FK_C140406BE19F41BF');
        $this->addSql('ALTER TABLE paises_clasificados DROP FOREIGN KEY FK_4460520FC604D5C6');
        $this->addSql('ALTER TABLE paises_clasificados DROP FOREIGN KEY FK_4460520FA466EFA5');
        $this->addSql('DROP TABLE ciudad');
        $this->addSql('DROP TABLE estadio');
        $this->addSql('DROP TABLE mundial');
        $this->addSql('DROP TABLE pais');
        $this->addSql('DROP TABLE paises_clasificados');
    }
}
