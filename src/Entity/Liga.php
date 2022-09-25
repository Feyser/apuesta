<?php

namespace App\Entity;

use App\Repository\LigaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigaRepository::class)
 */
class Liga
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="ligas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Usuario;

    /**
     * @ORM\ManyToOne(targetEntity=Mundial::class, inversedBy="mundial")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Mundial;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaRegistro;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $Tipo;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $Estado;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $TotalRecaudado;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    private $Ganancia;

    /**
     * @ORM\OneToMany(targetEntity=Equipo::class, mappedBy="Liga")
     */
    private $Equipo;

    /**
     * @ORM\OneToMany(targetEntity=Invitacion::class, mappedBy="Liga")
     */
    private $liga;

    /**
     * @ORM\OneToMany(targetEntity=Apuesta::class, mappedBy="Liga")
     */
    private $Apuesta;

    public function __construct()
    {
        $this->Equipo = new ArrayCollection();
        $this->liga = new ArrayCollection();
        $this->Apuesta = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMundial(): ?Mundial
    {
        return $this->Mundial;
    }

    public function setMundial(?Mundial $Mundial): self
    {
        $this->Mundial = $Mundial;

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

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->FechaRegistro;
    }

    public function setFechaRegistro(\DateTimeInterface $FechaRegistro): self
    {
        $this->FechaRegistro = $FechaRegistro;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->Tipo;
    }

    public function setTipo(string $Tipo): self
    {
        $this->Tipo = $Tipo;

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

    public function getTotalRecaudado(): ?string
    {
        return $this->TotalRecaudado;
    }

    public function setTotalRecaudado(?string $TotalRecaudado): self
    {
        $this->TotalRecaudado = $TotalRecaudado;

        return $this;
    }

    public function getGanancia(): ?string
    {
        return $this->Ganancia;
    }

    public function setGanancia(?string $Ganancia): self
    {
        $this->Ganancia = $Ganancia;

        return $this;
    }

    /**
     * @return Collection<int, Equipo>
     */
    public function getEquipo(): Collection
    {
        return $this->Equipo;
    }

    public function addEquipo(Equipo $equipo): self
    {
        if (!$this->Equipo->contains($equipo)) {
            $this->Equipo[] = $equipo;
            $equipo->setLiga($this);
        }

        return $this;
    }

    public function removeEquipo(Equipo $equipo): self
    {
        if ($this->Equipo->removeElement($equipo)) {
            // set the owning side to null (unless already changed)
            if ($equipo->getLiga() === $this) {
                $equipo->setLiga(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Invitacion>
     */
    public function getLiga(): Collection
    {
        return $this->liga;
    }

    public function addLiga(Invitacion $liga): self
    {
        if (!$this->liga->contains($liga)) {
            $this->liga[] = $liga;
            $liga->setLiga($this);
        }

        return $this;
    }

    public function removeLiga(Invitacion $liga): self
    {
        if ($this->liga->removeElement($liga)) {
            // set the owning side to null (unless already changed)
            if ($liga->getLiga() === $this) {
                $liga->setLiga(null);
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
            $apuestum->setLiga($this);
        }

        return $this;
    }

    public function removeApuestum(Apuesta $apuestum): self
    {
        if ($this->Apuesta->removeElement($apuestum)) {
            // set the owning side to null (unless already changed)
            if ($apuestum->getLiga() === $this) {
                $apuestum->setLiga(null);
            }
        }

        return $this;
    }
}
