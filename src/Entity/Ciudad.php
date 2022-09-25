<?php

namespace App\Entity;

use App\Repository\CiudadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CiudadRepository::class)
 */
class Ciudad
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
     * @ORM\ManyToOne(targetEntity=Pais::class, inversedBy="pais")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Pais;

    /**
     * @ORM\OneToMany(targetEntity=Estadio::class, mappedBy="Ciudad")
     */
    private $ciudad;

    public function __construct()
    {
        $this->ciudad = new ArrayCollection();
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

    public function getPais(): ?Pais
    {
        return $this->Pais;
    }

    public function setPais(?Pais $Pais): self
    {
        $this->Pais = $Pais;

        return $this;
    }

    /**
     * @return Collection<int, Estadio>
     */
    public function getCiudad(): Collection
    {
        return $this->ciudad;
    }

    public function addCiudad(Estadio $ciudad): self
    {
        if (!$this->ciudad->contains($ciudad)) {
            $this->ciudad[] = $ciudad;
            $ciudad->setCiudad($this);
        }

        return $this;
    }

    public function removeCiudad(Estadio $ciudad): self
    {
        if ($this->ciudad->removeElement($ciudad)) {
            // set the owning side to null (unless already changed)
            if ($ciudad->getCiudad() === $this) {
                $ciudad->setCiudad(null);
            }
        }

        return $this;
    }
}
