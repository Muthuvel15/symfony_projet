<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
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
    private $modele;

    /**
     * @ORM\OneToOne(targetEntity=Chassis::class, cascade={"persist", "remove"})
     */
    private $chassis;

    /**
     * @ORM\ManyToMany(targetEntity=Roue::class, inversedBy="vehicules")
     */
    private $roues;

    /**
     * @ORM\OneToMany(targetEntity=Couleur::class, mappedBy="vehicule")
     */
    private $Couleur;

   

    public function __construct()
    {
        $this->roues = new ArrayCollection();
        $this->Couleur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getChassis(): ?chassis
    {
        return $this->chassis;
    }

    public function setChassis(?chassis $chassis): self
    {
        $this->chassis = $chassis;

        return $this;
    }

    /**
     * @return Collection<int, Roue>
     */
    public function getRoues(): Collection
    {
        return $this->roues;
    }

    public function addRoue(Roue $roue): self
    {
        if (!$this->roues->contains($roue)) {
            $this->roues[] = $roue;
        }

        return $this;
    }

    public function removeRoue(Roue $roue): self
    {
        $this->roues->removeElement($roue);

        return $this;
    }

    /**
     * @return Collection<int, Couleur>
     */
    public function getCouleur(): Collection
    {
        return $this->Couleur;
    }

    public function addCouleur(Couleur $couleur): self
    {
        if (!$this->Couleur->contains($couleur)) {
            $this->Couleur[] = $couleur;
            $couleur->setVehicule($this);
        }

        return $this;
    }

    public function removeCouleur(Couleur $couleur): self
    {
        if ($this->Couleur->removeElement($couleur)) {
            // set the owning side to null (unless already changed)
            if ($couleur->getVehicule() === $this) {
                $couleur->setVehicule(null);
            }
        }

        return $this;
    }

  
    
}
