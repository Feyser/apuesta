<?php

namespace App\Entity;

use App\Repository\EquipoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipoRepository::class)
 */
class Equipo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Liga::class, inversedBy="Equipo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Liga;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="Equipo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Usuario;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    private $TotalRecaudado;

    /**
     * @ORM\OneToMany(targetEntity=Invitacion::class, mappedBy="Equipo")
     */
    private $equipo;

    /**
     * @ORM\OneToMany(targetEntity=Apuesta::class, mappedBy="Equipo")
     */
    private $Apuesta;

    public function __construct()
    {
        $this->equipo = new ArrayCollection();
        $this->Apuesta = new ArrayCollection();
    }

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

    public function getUsuario(): ?Usuario
    {
        return $this->Usuario;
    }

    public function setUsuario(?Usuario $Usuario): self
    {
        $this->Usuario = $Usuario;

        return $this;
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

    public function getTotalRecaudado(): ?string
    {
        return $this->TotalRecaudado;
    }

    public function setTotalRecaudado(?string $TotalRecaudado): self
    {
        $this->TotalRecaudado = $TotalRecaudado;

        return $this;
    }

    /**
     * @return Collection<int, Invitacion>
     */
    public function getEquipo(): Collection
    {
        return $this->equipo;
    }

    public function addEquipo(Invitacion $equipo): self
    {
        if (!$this->equipo->contains($equipo)) {
            $this->equipo[] = $equipo;
            $equipo->setEquipo($this);
        }

        return $this;
    }

    public function removeEquipo(Invitacion $equipo): self
    {
        if ($this->equipo->removeElement($equipo)) {
            // set the owning side to null (unless already changed)
            if ($equipo->getEquipo() === $this) {
                $equipo->setEquipo(null);
            }
        }

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
            $apuestum->setEquipo($this);
        }

        return $this;
    }

    public function removeApuestum(Apuesta $apuestum): self
    {
        if ($this->Apuesta->removeElement($apuestum)) {
            // set the owning side to null (unless already changed)
            if ($apuestum->getEquipo() === $this) {
                $apuestum->setEquipo(null);
            }
        }

        return $this;
    }
}
