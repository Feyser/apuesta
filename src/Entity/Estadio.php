<?php

namespace App\Entity;

use App\Repository\EstadioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstadioRepository::class)
 */
class Estadio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $Nombre;

    /**
     * @ORM\ManyToOne(targetEntity=Ciudad::class, inversedBy="ciudad")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Ciudad;

    /**
     * @ORM\OneToMany(targetEntity=Jornada::class, mappedBy="Estadio")
     */
    private $Jornada;

    public function __construct()
    {
        $this->Jornada = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getCiudad(): ?Ciudad
    {
        return $this->Ciudad;
    }

    public function setCiudad(?Ciudad $Ciudad): self
    {
        $this->Ciudad = $Ciudad;

        return $this;
    }

    /**
     * @return Collection<int, Jornada>
     */
    public function getJornada(): Collection
    {
        return $this->Jornada;
    }

    public function addJornada(Jornada $jornada): self
    {
        if (!$this->Jornada->contains($jornada)) {
            $this->Jornada[] = $jornada;
            $jornada->setEstadio($this);
        }

        return $this;
    }

    public function removeJornada(Jornada $jornada): self
    {
        if ($this->Jornada->removeElement($jornada)) {
            // set the owning side to null (unless already changed)
            if ($jornada->getEstadio() === $this) {
                $jornada->setEstadio(null);
            }
        }

        return $this;
    }
}
