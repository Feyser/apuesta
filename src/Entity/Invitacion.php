<?php

namespace App\Entity;

use App\Repository\InvitacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvitacionRepository::class)
 */
class Invitacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Liga::class, inversedBy="liga")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Liga;

    /**
     * @ORM\ManyToOne(targetEntity=Equipo::class, inversedBy="equipo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Equipo;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $Token;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    private $Estado;

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

    public function getToken(): ?string
    {
        return $this->Token;
    }

    public function setToken(?string $Token): self
    {
        $this->Token = $Token;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->Estado;
    }

    public function setEstado(?string $Estado): self
    {
        $this->Estado = $Estado;

        return $this;
    }
}
