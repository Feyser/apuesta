<?php

namespace App\Entity;

use App\Repository\ClasificacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasificacionRepository::class)
 */
class Clasificacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=PaisesClasificados::class, inversedBy="Clasificacion", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Pais;

    /**
     * @ORM\Column(type="integer")
     */
    private $Posicion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPais(): ?PaisesClasificados
    {
        return $this->Pais;
    }

    public function setPais(PaisesClasificados $Pais): self
    {
        $this->Pais = $Pais;

        return $this;
    }

    public function getPosicion(): ?int
    {
        return $this->Posicion;
    }

    public function setPosicion(int $Posicion): self
    {
        $this->Posicion = $Posicion;

        return $this;
    }
}
