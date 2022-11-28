<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteRepository::class)]
class Compte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 3)]
    private ?string $numRue = null;

    #[ORM\Column(length: 50)]
    private ?string $copos = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 50)]
    private ?string $tel = null;

    #[ORM\Column(length: 50)]
    private ?string $mail = null;

    #[ORM\Column(length: 70)]
    private ?string $motDePasse = null;

    #[ORM\OneToOne(mappedBy: 'compte', cascade: ['persist', 'remove'])]
    private ?Eleve $eleve = null;

    #[ORM\OneToMany(mappedBy: 'responsable', targetEntity: Eleve::class)]
    private Collection $enfants;

    #[ORM\OneToOne(mappedBy: 'compte', cascade: ['persist', 'remove'])]
    private ?ProfesseurCours $professeur = null;

    #[ORM\Column(length: 255)]
    private ?string $rue = null;

    public function __construct()
    {
        $this->eleve = new ArrayCollection();
        $this->enfants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumRue(): ?string
    {
        return $this->numRue;
    }

    public function setNumRue(string $numRue): self
    {
        $this->numRue = $numRue;

        return $this;
    }

    public function getCopos(): ?string
    {
        return $this->copos;
    }

    public function setCopos(string $copos): self
    {
        $this->copos = $copos;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(Eleve $eleve): self
    {
        // set the owning side of the relation if necessary
        if ($eleve->getCompte() !== $this) {
            $eleve->setCompte($this);
        }

        $this->eleve = $eleve;

        return $this;
    }

    /**
     * @return Collection<int, Eleve>
     */
    public function getEnfants(): Collection
    {
        return $this->enfants;
    }

    public function addEnfant(Eleve $enfant): self
    {
        if (!$this->enfants->contains($enfant)) {
            $this->enfants->add($enfant);
            $enfant->setResponsable($this);
        }

        return $this;
    }

    public function removeEnfant(Eleve $enfant): self
    {
        if ($this->enfants->removeElement($enfant)) {
            // set the owning side to null (unless already changed)
            if ($enfant->getResponsable() === $this) {
                $enfant->setResponsable(null);
            }
        }

        return $this;
    }

    public function getProfesseur(): ?ProfesseurCours
    {
        return $this->professeur;
    }

    public function setProfesseur(ProfesseurCours $professeur): self
    {
        // set the owning side of the relation if necessary
        if ($professeur->getCompte() !== $this) {
            $professeur->setCompte($this);
        }

        $this->professeur = $professeur;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }


}
