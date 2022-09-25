<?php

namespace App\Entity;

use App\Repository\PaisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaisRepository::class)
 */
class Pais
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
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=Ciudad::class, mappedBy="Pais")
     */
    private $pais;

    /**
     * @ORM\OneToMany(targetEntity=Mundial::class, mappedBy="Sede")
     */
    private $sede;

    /**
     * @ORM\OneToMany(targetEntity=PaisesClasificados::class, mappedBy="Pais")
     */
    private $clasificado;

    public function __construct()
    {
        $this->pais = new ArrayCollection();
        $this->sede = new ArrayCollection();
        $this->clasificado = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection<int, Ciudad>
     */
    public function getPais(): Collection
    {
        return $this->pais;
    }

    public function addPai(Ciudad $pai): self
    {
        if (!$this->pais->contains($pai)) {
            $this->pais[] = $pai;
            $pai->setPais($this);
        }

        return $this;
    }

    public function removePai(Ciudad $pai): self
    {
        if ($this->pais->removeElement($pai)) {
            // set the owning side to null (unless already changed)
            if ($pai->getPais() === $this) {
                $pai->setPais(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Mundial>
     */
    public function getSede(): Collection
    {
        return $this->sede;
    }

    public function addSede(Mundial $sede): self
    {
        if (!$this->sede->contains($sede)) {
            $this->sede[] = $sede;
            $sede->setSede($this);
        }

        return $this;
    }

    public function removeSede(Mundial $sede): self
    {
        if ($this->sede->removeElement($sede)) {
            // set the owning side to null (unless already changed)
            if ($sede->getSede() === $this) {
                $sede->setSede(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PaisesClasificados>
     */
    public function getClasificado(): Collection
    {
        return $this->clasificado;
    }

    public function addClasificado(PaisesClasificados $clasificado): self
    {
        if (!$this->clasificado->contains($clasificado)) {
            $this->clasificado[] = $clasificado;
            $clasificado->setPais($this);
        }

        return $this;
    }

    public function removeClasificado(PaisesClasificados $clasificado): self
    {
        if ($this->clasificado->removeElement($clasificado)) {
            // set the owning side to null (unless already changed)
            if ($clasificado->getPais() === $this) {
                $clasificado->setPais(null);
            }
        }

        return $this;
    }
}
