<?php

namespace App\Entity;

use App\Repository\RoueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RoueRepository::class)
 * 
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
     * @Assert\Range(min=10, minMessage="Le diamètre doit faire au maximun 20",max=20 ,maxMessage="Le diamétre doit faire au maximum 20")
     * 
     */
    private $diametre;

    /**
     * @ORM\ManyToMany(targetEntity=Vehicule::class, mappedBy="roues")
     */
    private $vehicules;

    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Vehicule>
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules[] = $vehicule;
            $vehicule->addRoue($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->removeElement($vehicule)) {
            $vehicule->removeRoue($this);
        }

        return $this;
    }
}
