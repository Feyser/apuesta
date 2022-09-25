<?php

namespace App\Entity;

use App\Repository\MundialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MundialRepository::class)
 */
class Mundial
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaInicio;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaFin;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $Descripcion;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $Estado;

    /**
     * @ORM\ManyToOne(targetEntity=Pais::class, inversedBy="sede")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Sede;

    /**
     * @ORM\OneToMany(targetEntity=PaisesClasificados::class, mappedBy="Mundial")
     */
    private $copa;

    /**
     * @ORM\OneToMany(targetEntity=Liga::class, mappedBy="Mundial")
     */
    private $mundial;

    /**
     * @ORM\OneToMany(targetEntity=Jornada::class, mappedBy="Mundial")
     */
    private $Mundial;

    /**
     * @ORM\OneToMany(targetEntity=Posiciones::class, mappedBy="Mundial")
     */
    private $Posicion;

    public function __construct()
    {
        $this->copa = new ArrayCollection();
        $this->mundial = new ArrayCollection();
        $this->Mundial = new ArrayCollection();
        $this->Posicion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->FechaInicio;
    }

    public function setFechaInicio(\DateTimeInterface $FechaInicio): self
    {
        $this->FechaInicio = $FechaInicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->FechaFin;
    }

    public function setFechaFin(\DateTimeInterface $FechaFin): self
    {
        $this->FechaFin = $FechaFin;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->Descripcion;
    }

    public function setDescripcion(?string $Descripcion): self
    {
        $this->Descripcion = $Descripcion;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->Estado;
    }

    public function setEstado(string $Estado): self
    {
        $this->Estado = $Estado;

        return $this;
    }

    public function getSede(): ?Pais
    {
        return $this->Sede;
    }

    public function setSede(?Pais $Sede): self
    {
        $this->Sede = $Sede;

        return $this;
    }

    /**
     * @return Collection<int, PaisesClasificados>
     */
    public function getCopa(): Collection
    {
        return $this->copa;
    }

    public function addCopa(PaisesClasificados $copa): self
    {
        if (!$this->copa->contains($copa)) {
            $this->copa[] = $copa;
            $copa->setMundial($this);
        }

        return $this;
    }

    public function removeCopa(PaisesClasificados $copa): self
    {
        if ($this->copa->removeElement($copa)) {
            // set the owning side to null (unless already changed)
            if ($copa->getMundial() === $this) {
                $copa->setMundial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Liga>
     */
    public function getMundial(): Collection
    {
        return $this->mundial;
    }

    public function addMundial(Liga $mundial): self
    {
        if (!$this->mundial->contains($mundial)) {
            $this->mundial[] = $mundial;
            $mundial->setMundial($this);
        }

        return $this;
    }

    public function removeMundial(Liga $mundial): self
    {
        if ($this->mundial->removeElement($mundial)) {
            // set the owning side to null (unless already changed)
            if ($mundial->getMundial() === $this) {
                $mundial->setMundial(null);
            }
        }

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
            $posicion->setMundial($this);
        }

        return $this;
    }

    public function removePosicion(Posiciones $posicion): self
    {
        if ($this->Posicion->removeElement($posicion)) {
            // set the owning side to null (unless already changed)
            if ($posicion->getMundial() === $this) {
                $posicion->setMundial(null);
            }
        }

        return $this;
    }
}
