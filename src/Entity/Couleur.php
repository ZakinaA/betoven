<?php

namespace App\Entity;

use App\Repository\CouleurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouleurRepository::class)]
class Couleur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Instrument::class, mappedBy: 'couleur')]
    private Collection $instruments;

    public function __construct()
    {
        $this->instruments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Instrument>
     */
    public function getInstruments(): Collection
    {
        return $this->instruments;
    }

    public function addInstrument(Instrument $instrument): self
    {
        if (!$this->instruments->contains($instrument)) {
            $this->instruments->add($instrument);
            $instrument->addCouleur($this);
        }

        return $this;
    }

    public function removeInstrument(Instrument $instrument): self
    {
        if ($this->instruments->removeElement($instrument)) {
            $instrument->removeCouleur($this);
        }

        return $this;
    }
}
