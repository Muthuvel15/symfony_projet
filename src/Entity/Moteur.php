<?php

namespace App\Entity;

use App\Repository\MoteurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MoteurRepository::class)
 */
class Moteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $energie;

    /**
     * @ORM\Column(type="integer")
     */
    private $puissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $no_serie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    public function setEnergie(string $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getNoSerie(): ?string
    {
        return $this->no_serie;
    }

    public function setNoSerie(string $no_serie): self
    {
        $this->no_serie = $no_serie;

        return $this;
    }
}
