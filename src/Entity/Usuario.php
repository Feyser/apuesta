<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $Nombres;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Apellidos;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $Password;

    /**
     * @ORM\ManyToOne(targetEntity=Rol::class, inversedBy="usuario")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Rol;

    /**
     * @ORM\OneToMany(targetEntity=Liga::class, mappedBy="Usuario")
     */
    private $ligas;

    /**
     * @ORM\OneToMany(targetEntity=Equipo::class, mappedBy="Usuario")
     */
    private $Equipo;

    public function __construct()
    {
        $this->ligas = new ArrayCollection();
        $this->Equipo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombres(): ?string
    {
        return $this->Nombres;
    }

    public function setNombres(string $Nombres): self
    {
        $this->Nombres = $Nombres;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->Apellidos;
    }

    public function setApellidos(string $Apellidos): self
    {
        $this->Apellidos = $Apellidos;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getRol(): ?Rol
    {
        return $this->Rol;
    }

    public function setRol(?Rol $Rol): self
    {
        $this->Rol = $Rol;

        return $this;
    }

    /**
     * @return Collection<int, Liga>
     */
    public function getLigas(): Collection
    {
        return $this->ligas;
    }

    public function addLiga(Liga $liga): self
    {
        if (!$this->ligas->contains($liga)) {
            $this->ligas[] = $liga;
            $liga->setUsuario($this);
        }

        return $this;
    }

    public function removeLiga(Liga $liga): self
    {
        if ($this->ligas->removeElement($liga)) {
            // set the owning side to null (unless already changed)
            if ($liga->getUsuario() === $this) {
                $liga->setUsuario(null);
            }
        }

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
            $equipo->setUsuario($this);
        }

        return $this;
    }

    public function removeEquipo(Equipo $equipo): self
    {
        if ($this->Equipo->removeElement($equipo)) {
            // set the owning side to null (unless already changed)
            if ($equipo->getUsuario() === $this) {
                $equipo->setUsuario(null);
            }
        }

        return $this;
    }
}
