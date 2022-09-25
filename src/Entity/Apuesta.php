<?php

namespace App\Entity;

use App\Repository\ApuestaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApuestaRepository::class)
 */
class Apuesta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Liga::class, inversedBy="Apuesta")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Liga;

    /**
     * @ORM\ManyToOne(targetEntity=Equipo::class, inversedBy="Apuesta")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Equipo;

    /**
     * @ORM\ManyToOne(targetEntity=Jornada::class, inversedBy="Apuesta")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Jornada;

    /**
     * @ORM\Column(type="integer")
     */
    private $Local;

    /**
     * @ORM\Column(type="integer")
     */
    private $Visitante;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=2)
     */
    private $Monto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLiga(): ?Liga
    {
        return $this->Liga;
    }

    public function setLiga(?Liga $Liga): self
    {
        $this->Liga = $Liga;

        return $this;
    }

    public function getEquipo(): ?Equipo
    {
        return $this->Equipo;
    }

    public function setEquipo(?Equipo $Equipo): self
    {
        $this->Equipo = $Equipo;

        return $this;
    }

    public function getJornada(): ?Jornada
    {
        return $this->Jornada;
    }

    public function setJornada(?Jornada $Jornada): self
    {
        $this->Jornada = $Jornada;

        return $this;
    }

    public function getLocal(): ?int
    {
        return $this->Local;
    }

    public function setLocal(int $Local): self
    {
        $this->Local = $Local;

        return $this;
    }

    public function getVisitante(): ?int
    {
        return $this->Visitante;
    }

    public function setVisitante(int $Visitante): self
    {
        $this->Visitante = $Visitante;

        return $this;
    }

    public function getMonto(): ?string
    {
        return $this->Monto;
    }

    public function setMonto(string $Monto): self
    {
        $this->Monto = $Monto;

        return $this;
    }
}
