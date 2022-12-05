<?php

namespace App\Entity;

use App\Repository\TypeInstrumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeInstrumentRepository::class)]
class TypeInstrument
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'typeIntrument', targetEntity: Instrument::class)]
    private Collection $instruments;

    #[ORM\ManyToOne(inversedBy: 'typeInstruments')]
    private ?ClasseInstrument $classeIntrument = null;

    public function __construct()
    {
        $this->instruments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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
            $instrument->setTypeIntrument($this);
        }

        return $this;
    }

    public function removeInstrument(Instrument $instrument): self
    {
        if ($this->instruments->removeElement($instrument)) {
            // set the owning side to null (unless already changed)
            if ($instrument->getTypeIntrument() === $this) {
                $instrument->setTypeIntrument(null);
            }
        }

        return $this;
    }

    public function getClasseIntrument(): ?ClasseInstrument
    {
        return $this->classeIntrument;
    }

    public function setClasseIntrument(?ClasseInstrument $classeIntrument): self
    {
        $this->classeIntrument = $classeIntrument;

        return $this;
    }
}
