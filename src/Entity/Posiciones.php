<?php

namespace App\Entity;

use App\Repository\PosicionesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PosicionesRepository::class)
 */
class Posiciones
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Mundial::class, inversedBy="Posicion")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Mundial;

    /**
     * @ORM\ManyToOne(targetEntity=Grupo::class, inversedBy="Posicion")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Grupo;

    /**
     * @ORM\OneToOne(targetEntity=PaisesClasificados::class, inversedBy="Posicion", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Pais;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Partidos;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Ganados;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Empatados;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Perdidos;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $GolesFavor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $GolesContra;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Puntos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMundial(): ?Mundial
    {
        return $this->Mundial;
    }

    public function setMundial(?Mundial $Mundial): self
    {
        $this->Mundial = $Mundial;

        return $this;
    }

    public function getGrupo(): ?Grupo
    {
        return $this->Grupo;
    }

    public function setGrupo(?Grupo $Grupo): self
    {
        $this->Grupo = $Grupo;

        return $this;
    }

    public function getPais(): ?PaisesClasificados
    {
        return $this->Pais;
    }

    public function setPais(PaisesClasificados $Pais): self
    {
        $this->Pais = $Pais;

        return $this;
    }

    public function getPartidos(): ?int
    {
        return $this->Partidos;
    }

    public function setPartidos(?int $Partidos): self
    {
        $this->Partidos = $Partidos;

        return $this;
    }

    public function getGanados(): ?int
    {
        return $this->Ganados;
    }

    public function setGanados(?int $Ganados): self
    {
        $this->Ganados = $Ganados;

        return $this;
    }

    public function getEmpatados(): ?int
    {
        return $this->Empatados;
    }

    public function setEmpatados(?int $Empatados): self
    {
        $this->Empatados = $Empatados;

        return $this;
    }

    public function getPerdidos(): ?int
    {
        return $this->Perdidos;
    }

    public function setPerdidos(?int $Perdidos): self
    {
        $this->Perdidos = $Perdidos;

        return $this;
    }

    public function getGolesFavor(): ?int
    {
        return $this->GolesFavor;
    }

    public function setGolesFavor(?int $GolesFavor): self
    {
        $this->GolesFavor = $GolesFavor;

        return $this;
    }

    public function getGolesContra(): ?int
    {
        return $this->GolesContra;
    }

    public function setGolesContra(?int $GolesContra): self
    {
        $this->GolesContra = $GolesContra;

        return $this;
    }

    public function getPuntos(): ?int
    {
        return $this->Puntos;
    }

    public function setPuntos(?int $Puntos): self
    {
        $this->Puntos = $Puntos;

        return $this;
    }
}
