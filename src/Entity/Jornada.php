<?php

namespace App\Entity;

use App\Repository\JornadaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JornadaRepository::class)
 */
class Jornada
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Estadio::class, inversedBy="Jornada")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Estadio;

    /**
     * @ORM\ManyToOne(targetEntity=PaisesClasificados::class, inversedBy="Local")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Local;

    /**
     * @ORM\ManyToOne(targetEntity=PaisesClasificados::class, inversedBy="Visitante")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Visitante;

    /**
     * @ORM\ManyToOne(targetEntity=Mundial::class, inversedBy="Mundial")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Mundial;

    /**
     * @ORM\ManyToOne(targetEntity=Ronda::class, inversedBy="Ronda")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Ronda;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $MarcadorLocal;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $MarcadorVisitante;

    /**
     * @ORM\Column(type="date")
     */
    private $Fecha;

    /**
     * @ORM\OneToMany(targetEntity=Apuesta::class, mappedBy="Jornada")
     */
    private $Apuesta;

    public function __construct()
    {
        $this->Apuesta = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstadio(): ?Estadio
    {
        return $this->Estadio;
    }

    public function setEstadio(?Estadio $Estadio): self
    {
        $this->Estadio = $Estadio;

        return $this;
    }

    public function getLocal(): ?PaisesClasificados
    {
        return $this->Local;
    }

    public function setLocal(?PaisesClasificados $Local): self
    {
        $this->Local = $Local;

        return $this;
    }

    public function getVisitante(): ?PaisesClasificados
    {
        return $this->Visitante;
    }

    public function setVisitante(?PaisesClasificados $Visitante): self
    {
        $this->Visitante = $Visitante;

        return $this;
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

    public function getRonda(): ?Ronda
    {
        return $this->Ronda;
    }

    public function setRonda(?Ronda $Ronda): self
    {
        $this->Ronda = $Ronda;

        return $this;
    }

    public function getMarcadorLocal(): ?int
    {
        return $this->MarcadorLocal;
    }

    public function setMarcadorLocal(?int $MarcadorLocal): self
    {
        $this->MarcadorLocal = $MarcadorLocal;

        return $this;
    }

    public function getMarcadorVisitante(): ?int
    {
        return $this->MarcadorVisitante;
    }

    public function setMarcadorVisitante(?int $MarcadorVisitante): self
    {
        $this->MarcadorVisitante = $MarcadorVisitante;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->Fecha;
    }

    public function setFecha(\DateTimeInterface $Fecha): self
    {
        $this->Fecha = $Fecha;

        return $this;
    }

    /**
     * @return Collection<int, Apuesta>
     */
    public function getApuesta(): Collection
    {
        return $this->Apuesta;
    }

    public function addApuestum(Apuesta $apuestum): self
    {
        if (!$this->Apuesta->contains($apuestum)) {
            $this->Apuesta[] = $apuestum;
            $apuestum->setJornada($this);
        }

        return $this;
    }

    public function removeApuestum(Apuesta $apuestum): self
    {
        if ($this->Apuesta->removeElement($apuestum)) {
            // set the owning side to null (unless already changed)
            if ($apuestum->getJornada() === $this) {
                $apuestum->setJornada(null);
            }
        }

        return $this;
    }
}
