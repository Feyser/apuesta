<?php

namespace App\Entity;

use App\Repository\PaisesClasificadosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaisesClasificadosRepository::class)
 */
class PaisesClasificados
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Pais::class, inversedBy="clasificado")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Pais;

    /**
     * @ORM\ManyToOne(targetEntity=Mundial::class, inversedBy="copa")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Mundial;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $Participacion;

    /**
     * @ORM\OneToMany(targetEntity=Jornada::class, mappedBy="Local")
     */
    private $Local;

    /**
     * @ORM\OneToMany(targetEntity=Jornada::class, mappedBy="Visitante")
     */
    private $Visitante;

    /**
     * @ORM\OneToOne(targetEntity=Posiciones::class, mappedBy="Pais", cascade={"persist", "remove"})
     */
    private $Posicion;

    /**
     * @ORM\OneToOne(targetEntity=Clasificacion::class, mappedBy="Pais", cascade={"persist", "remove"})
     */
    private $Clasificacion;

    public function __construct()
    {
        $this->Local = new ArrayCollection();
        $this->Visitante = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMundial(): ?Mundial
    {
        return $this->Mundial;
    }

    public function setMundial(?Mundial $Mundial): self
    {
        $this->Mundial = $Mundial;

        return $this;
    }

    public function getParticipacion(): ?string
    {
        return $this->Participacion;
    }

    public function setParticipacion(string $Participacion): self
    {
        $this->Participacion = $Participacion;

        return $this;
    }

    /**
     * @return Collection<int, Jornada>
     */
    public function getLocal(): Collection
    {
        return $this->Local;
    }

    public function addLocal(Jornada $local): self
    {
        if (!$this->Local->contains($local)) {
            $this->Local[] = $local;
            $local->setLocal($this);
        }

        return $this;
    }

    public function removeLocal(Jornada $local): self
    {
        if ($this->Local->removeElement($local)) {
            // set the owning side to null (unless already changed)
            if ($local->getLocal() === $this) {
                $local->setLocal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Jornada>
     */
    public function getVisitante(): Collection
    {
        return $this->Visitante;
    }

    public function addVisitante(Jornada $visitante): self
    {
        if (!$this->Visitante->contains($visitante)) {
            $this->Visitante[] = $visitante;
            $visitante->setVisitante($this);
        }

        return $this;
    }

    public function removeVisitante(Jornada $visitante): self
    {
        if ($this->Visitante->removeElement($visitante)) {
            // set the owning side to null (unless already changed)
            if ($visitante->getVisitante() === $this) {
                $visitante->setVisitante(null);
            }
        }

        return $this;
    }

    public function getPosicion(): ?Posiciones
    {
        return $this->Posicion;
    }

    public function setPosicion(Posiciones $Posicion): self
    {
        // set the owning side of the relation if necessary
        if ($Posicion->getPais() !== $this) {
            $Posicion->setPais($this);
        }

        $this->Posicion = $Posicion;

        return $this;
    }

    public function getClasificacion(): ?Clasificacion
    {
        return $this->Clasificacion;
    }

    public function setClasificacion(Clasificacion $Clasificacion): self
    {
        // set the owning side of the relation if necessary
        if ($Clasificacion->getPais() !== $this) {
            $Clasificacion->setPais($this);
        }

        $this->Clasificacion = $Clasificacion;

        return $this;
    }
}
