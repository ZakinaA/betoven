<?php

namespace App\Entity;

use App\Repository\InstrumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstrumentRepository::class)]
class Instrument
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $numSerie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateAchat = null;

    #[ORM\Column(length: 10)]
    private ?string $prixAchat = null;

    #[ORM\ManyToMany(targetEntity: Couleur::class, mappedBy: 'instrument')]
    private Collection $couleurs;

    #[ORM\OneToMany(mappedBy: 'instrument', targetEntity: Accessoire::class)]
    private Collection $accessoires;

    #[ORM\ManyToOne(inversedBy: 'instruments')]
    private ?TypeInstrument $typeIntrument = null;

    #[ORM\ManyToOne(inversedBy: 'instruments')]
    private ?Marque $marque = null;

    #[ORM\ManyToMany(targetEntity: couleur::class, inversedBy: 'instruments')]
    private Collection $couleur;


    public function __construct()
    {
        $this->couleurs = new ArrayCollection();
        $this->accessoires = new ArrayCollection();
        $this->couleur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSerie(): ?string
    {
        return $this->numSerie;
    }

    public function setNumSerie(string $numSerie): self
    {
        $this->numSerie = $numSerie;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getPrixAchat(): ?string
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(string $prixAchat): self
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    /**
     * @return Collection<int, Couleur>
     */
    public function getCouleurs(): Collection
    {
        return $this->couleurs;
    }

    public function addCouleur(Couleur $couleur): self
    {
        if (!$this->couleurs->contains($couleur)) {
            $this->couleurs->add($couleur);
            $couleur->addInstrument($this);
        }

        return $this;
    }

    public function removeCouleur(Couleur $couleur): self
    {
        if ($this->couleurs->removeElement($couleur)) {
            $couleur->removeInstrument($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Accessoire>
     */
    public function getAccessoires(): Collection
    {
        return $this->accessoires;
    }

    public function addAccessoire(Accessoire $accessoire): self
    {
        if (!$this->accessoires->contains($accessoire)) {
            $this->accessoires->add($accessoire);
            $accessoire->setInstrument($this);
        }

        return $this;
    }

    public function removeAccessoire(Accessoire $accessoire): self
    {
        if ($this->accessoires->removeElement($accessoire)) {
            // set the owning side to null (unless already changed)
            if ($accessoire->getInstrument() === $this) {
                $accessoire->setInstrument(null);
            }
        }

        return $this;
    }

    public function getTypeIntrument(): ?TypeInstrument
    {
        return $this->typeIntrument;
    }

    public function setTypeIntrument(?TypeInstrument $typeIntrument): self
    {
        $this->typeIntrument = $typeIntrument;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Collection<int, couleur>
     */
    public function getCouleur(): Collection
    {
        return $this->couleur;
    }
}
