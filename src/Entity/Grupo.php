<?php

namespace App\Entity;

use App\Repository\GrupoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GrupoRepository::class)
 */
class Grupo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nombre;

    /**
     * @ORM\OneToMany(targetEntity=Posiciones::class, mappedBy="Grupo")
     */
    private $Posicion;

    public function __construct()
    {
        $this->Posicion = new ArrayCollection();
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

    /**
     * @return Collection<int, Posiciones>
     */
    public function getPosicion(): Collection
    {
        return $this->Posicion;
    }

    public function addPosicion(Posiciones $posicion): self
    {
        if (!$this->Posicion->contains($posicion)) {
            $this->Posicion[] = $posicion;
            $posicion->setGrupo($this);
        }

        return $this;
    }

    public function removePosicion(Posiciones $posicion): self
    {
        if ($this->Posicion->removeElement($posicion)) {
            // set the owning side to null (unless already changed)
            if ($posicion->getGrupo() === $this) {
                $posicion->setGrupo(null);
            }
        }

        return $this;
    }
}
