<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EleveRepository::class)]
class Eleve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'eleve', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Compte $compte = null;

    #[ORM\ManyToOne(inversedBy: 'enfants')]
    private ?Compte $responsable = null;

    #[ORM\OneToMany(mappedBy: 'inscriptions', targetEntity: Inscription::class, orphanRemoval: false)]
    private Collection $inscriptions;

    #[ORM\OneToMany(mappedBy: 'eleve', targetEntity: PretInstrument::class)]
    private Collection $pretinstrumentseleve;


    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
        $this->pretinstrumentseleve = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    public function getResponsable(): ?Compte
    {
        return $this->responsable;
    }

    public function setResponsable(?Compte $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions->add($inscription);
            $inscription->setEleve($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getEleve() === $this) {
                $inscription->setEleve(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PretInstrument>
     */
    public function getPretinstrumentseleve(): Collection
    {
        return $this->pretinstrumentseleve;
    }

    public function addPretinstrumentseleve(PretInstrument $pretinstrumentseleve): self
    {
        if (!$this->pretinstrumentseleve->contains($pretinstrumentseleve)) {
            $this->pretinstrumentseleve->add($pretinstrumentseleve);
            $pretinstrumentseleve->setEleve($this);
        }

        return $this;
    }

    public function removePretinstrumentseleve(PretInstrument $pretinstrumentseleve): self
    {
        if ($this->pretinstrumentseleve->removeElement($pretinstrumentseleve)) {
            // set the owning side to null (unless already changed)
            if ($pretinstrumentseleve->getEleve() === $this) {
                $pretinstrumentseleve->setEleve(null);
            }
        }

        return $this;
    }

}
