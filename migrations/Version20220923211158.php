<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220923211158 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apuesta (id INT AUTO_INCREMENT NOT NULL, liga_id INT NOT NULL, equipo_id INT NOT NULL, jornada_id INT NOT NULL, local INT NOT NULL, visitante INT NOT NULL, monto NUMERIC(9, 2) NOT NULL, INDEX IDX_A114C655CF098064 (liga_id), INDEX IDX_A114C65523BFBED (equipo_id), INDEX IDX_A114C65526E992D9 (jornada_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clasificacion (id INT AUTO_INCREMENT NOT NULL, pais_id INT NOT NULL, posicion INT NOT NULL, UNIQUE INDEX UNIQ_E9938171C604D5C6 (pais_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipo (id INT AUTO_INCREMENT NOT NULL, liga_id INT NOT NULL, usuario_id INT NOT NULL, nombre VARCHAR(200) NOT NULL, total_recaudado NUMERIC(9, 2) DEFAULT NULL, INDEX IDX_C49C530BCF098064 (liga_id), INDEX IDX_C49C530BDB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grupo (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invitacion (id INT AUTO_INCREMENT NOT NULL, liga_id INT NOT NULL, equipo_id INT NOT NULL, token VARCHAR(250) DEFAULT NULL, estado VARCHAR(4) DEFAULT NULL, INDEX IDX_3CD30E84CF098064 (liga_id), INDEX IDX_3CD30E8423BFBED (equipo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jornada (id INT AUTO_INCREMENT NOT NULL, estadio_id INT NOT NULL, local_id INT NOT NULL, visitante_id INT NOT NULL, mundial_id INT NOT NULL, ronda_id INT NOT NULL, marcador_local INT DEFAULT NULL, marcador_visitante INT DEFAULT NULL, fecha DATE NOT NULL, INDEX IDX_61D21CBFE5B3236E (estadio_id), INDEX IDX_61D21CBF5D5A2101 (local_id), INDEX IDX_61D21CBFD80AA8AF (visitante_id), INDEX IDX_61D21CBFA466EFA5 (mundial_id), INDEX IDX_61D21CBFB27F466B (ronda_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liga (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, mundial_id INT NOT NULL, nombre VARCHAR(200) NOT NULL, fecha_registro DATE NOT NULL, tipo VARCHAR(4) NOT NULL, estado VARCHAR(4) NOT NULL, total_recaudado NUMERIC(10, 2) DEFAULT NULL, ganancia NUMERIC(9, 2) DEFAULT NULL, INDEX IDX_7BBCBA6DB38439E (usuario_id), INDEX IDX_7BBCBA6A466EFA5 (mundial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posiciones (id INT AUTO_INCREMENT NOT NULL, mundial_id INT NOT NULL, grupo_id INT NOT NULL, pais_id INT NOT NULL, partidos INT DEFAULT NULL, ganados INT DEFAULT NULL, empatados INT DEFAULT NULL, perdidos INT DEFAULT NULL, goles_favor INT DEFAULT NULL, goles_contra INT DEFAULT NULL, puntos INT DEFAULT NULL, INDEX IDX_4020EA0DA466EFA5 (mundial_id), INDEX IDX_4020EA0D9C833003 (grupo_id), UNIQUE INDEX UNIQ_4020EA0DC604D5C6 (pais_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ronda (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apuesta ADD CONSTRAINT FK_A114C655CF098064 FOREIGN KEY (liga_id) REFERENCES liga (id)');
        $this->addSql('ALTER TABLE apuesta ADD CONSTRAINT FK_A114C65523BFBED FOREIGN KEY (equipo_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE apuesta ADD CONSTRAINT FK_A114C65526E992D9 FOREIGN KEY (jornada_id) REFERENCES jornada (id)');
        $this->addSql('ALTER TABLE clasificacion ADD CONSTRAINT FK_E9938171C604D5C6 FOREIGN KEY (pais_id) REFERENCES paises_clasificados (id)');
        $this->addSql('ALTER TABLE equipo ADD CONSTRAINT FK_C49C530BCF098064 FOREIGN KEY (liga_id) REFERENCES liga (id)');
        $this->addSql('ALTER TABLE equipo ADD CONSTRAINT FK_C49C530BDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE invitacion ADD CONSTRAINT FK_3CD30E84CF098064 FOREIGN KEY (liga_id) REFERENCES liga (id)');
        $this->addSql('ALTER TABLE invitacion ADD CONSTRAINT FK_3CD30E8423BFBED FOREIGN KEY (equipo_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE jornada ADD CONSTRAINT FK_61D21CBFE5B3236E FOREIGN KEY (estadio_id) REFERENCES estadio (id)');
        $this->addSql('ALTER TABLE jornada ADD CONSTRAINT FK_61D21CBF5D5A2101 FOREIGN KEY (local_id) REFERENCES paises_clasificados (id)');
        $this->addSql('ALTER TABLE jornada ADD CONSTRAINT FK_61D21CBFD80AA8AF FOREIGN KEY (visitante_id) REFERENCES paises_clasificados (id)');
        $this->addSql('ALTER TABLE jornada ADD CONSTRAINT FK_61D21CBFA466EFA5 FOREIGN KEY (mundial_id) REFERENCES mundial (id)');
        $this->addSql('ALTER TABLE jornada ADD CONSTRAINT FK_61D21CBFB27F466B FOREIGN KEY (ronda_id) REFERENCES ronda (id)');
        $this->addSql('ALTER TABLE liga ADD CONSTRAINT FK_7BBCBA6DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE liga ADD CONSTRAINT FK_7BBCBA6A466EFA5 FOREIGN KEY (mundial_id) REFERENCES mundial (id)');
        $this->addSql('ALTER TABLE posiciones ADD CONSTRAINT FK_4020EA0DA466EFA5 FOREIGN KEY (mundial_id) REFERENCES mundial (id)');
        $this->addSql('ALTER TABLE posiciones ADD CONSTRAINT FK_4020EA0D9C833003 FOREIGN KEY (grupo_id) REFERENCES grupo (id)');
        $this->addSql('ALTER TABLE posiciones ADD CONSTRAINT FK_4020EA0DC604D5C6 FOREIGN KEY (pais_id) REFERENCES paises_clasificados (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apuesta DROP FOREIGN KEY FK_A114C655CF098064');
        $this->addSql('ALTER TABLE apuesta DROP FOREIGN KEY FK_A114C65523BFBED');
        $this->addSql('ALTER TABLE apuesta DROP FOREIGN KEY FK_A114C65526E992D9');
        $this->addSql('ALTER TABLE clasificacion DROP FOREIGN KEY FK_E9938171C604D5C6');
        $this->addSql('ALTER TABLE equipo DROP FOREIGN KEY FK_C49C530BCF098064');
        $this->addSql('ALTER TABLE equipo DROP FOREIGN KEY FK_C49C530BDB38439E');
        $this->addSql('ALTER TABLE invitacion DROP FOREIGN KEY FK_3CD30E84CF098064');
        $this->addSql('ALTER TABLE invitacion DROP FOREIGN KEY FK_3CD30E8423BFBED');
        $this->addSql('ALTER TABLE jornada DROP FOREIGN KEY FK_61D21CBFE5B3236E');
        $this->addSql('ALTER TABLE jornada DROP FOREIGN KEY FK_61D21CBF5D5A2101');
        $this->addSql('ALTER TABLE jornada DROP FOREIGN KEY FK_61D21CBFD80AA8AF');
        $this->addSql('ALTER TABLE jornada DROP FOREIGN KEY FK_61D21CBFA466EFA5');
        $this->addSql('ALTER TABLE jornada DROP FOREIGN KEY FK_61D21CBFB27F466B');
        $this->addSql('ALTER TABLE liga DROP FOREIGN KEY FK_7BBCBA6DB38439E');
        $this->addSql('ALTER TABLE liga DROP FOREIGN KEY FK_7BBCBA6A466EFA5');
        $this->addSql('ALTER TABLE posiciones DROP FOREIGN KEY FK_4020EA0DA466EFA5');
        $this->addSql('ALTER TABLE posiciones DROP FOREIGN KEY FK_4020EA0D9C833003');
        $this->addSql('ALTER TABLE posiciones DROP FOREIGN KEY FK_4020EA0DC604D5C6');
        $this->addSql('DROP TABLE apuesta');
        $this->addSql('DROP TABLE clasificacion');
        $this->addSql('DROP TABLE equipo');
        $this->addSql('DROP TABLE grupo');
        $this->addSql('DROP TABLE invitacion');
        $this->addSql('DROP TABLE jornada');
        $this->addSql('DROP TABLE liga');
        $this->addSql('DROP TABLE posiciones');
        $this->addSql('DROP TABLE ronda');
    }
}
