<?php

namespace App\Entity;

use App\Repository\RondaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RondaRepository::class)
 */
class Ronda
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Nombre;

    /**
     * @ORM\OneToMany(targetEntity=Jornada::class, mappedBy="Ronda")
     */
    private $Ronda;

    public function __construct()
    {
        $this->Ronda = new ArrayCollection();
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
     * @return Collection<int, Jornada>
     */
    public function getRonda(): Collection
    {
        return $this->Ronda;
    }

    public function addRonda(Jornada $ronda): self
    {
        if (!$this->Ronda->contains($ronda)) {
            $this->Ronda[] = $ronda;
            $ronda->setRonda($this);
        }

        return $this;
    }

    public function removeRonda(Jornada $ronda): self
    {
        if ($this->Ronda->removeElement($ronda)) {
            // set the owning side to null (unless already changed)
            if ($ronda->getRonda() === $this) {
                $ronda->setRonda(null);
            }
        }

        return $this;
    }
}
