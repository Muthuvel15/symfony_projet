<?php

namespace App\Entity;

use App\Repository\RoueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoueRepository::class)
 */
class Roue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $diametre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiametre(): ?float
    {
        return $this->diametre;
    }

    public function setDiametre(float $diametre): self
    {
        $this->diametre = $diametre;

        return $this;
    }
}
