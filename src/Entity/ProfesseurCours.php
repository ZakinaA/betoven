<?php

namespace App\Entity;

use App\Repository\ProfesseurCoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurCoursRepository::class)]
class ProfesseurCours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'professeur', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Compte $compte = null;

    #[ORM\OneToMany(mappedBy: 'professeur', targetEntity: Cours::class)]
    private Collection $profCours;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
        $this->profCours = new ArrayCollection();
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

    /**
     * @return Collection<int, Cours>
     */
    public function getProfCours(): Collection
    {
        return $this->profCours;
    }

    public function addProfCour(Cours $profCour): self
    {
        if (!$this->profCours->contains($profCour)) {
            $this->profCours->add($profCour);
            $profCour->setProfesseur($this);
        }

        return $this;
    }

    public function removeProfCour(Cours $profCour): self
    {
        if ($this->profCours->removeElement($profCour)) {
            // set the owning side to null (unless already changed)
            if ($profCour->getProfesseur() === $this) {
                $profCour->setProfesseur(null);
            }
        }

        return $this;
    }
}
