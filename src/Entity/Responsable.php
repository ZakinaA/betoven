<?php

namespace App\Entity;

use App\Repository\ResponsableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResponsableRepository::class)]
class Responsable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Nom = null;

    #[ORM\Column(length: 50)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 50)]
    private ?string $Ville = null;

    #[ORM\Column(length: 5)]
    private ?string $Code_Postal = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Email = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $Tel1 = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $Tel2 = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $Tel3 = null;

    #[ORM\Column(length: 11, nullable: true)]
    private ?string $QuotientFamillial = null;

    #[ORM\OneToMany(mappedBy: 'eleve', targetEntity: Eleve::class)]
    private Collection $eleves;

    public function __construct()
    {
        $this->eleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->Code_Postal;
    }

    public function setCodePostal(string $Code_Postal): self
    {
        $this->Code_Postal = $Code_Postal;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTel1(): ?string
    {
        return $this->Tel1;
    }

    public function setTel1(?string $Tel1): self
    {
        $this->Tel1 = $Tel1;

        return $this;
    }

    public function getTel2(): ?string
    {
        return $this->Tel2;
    }

    public function setTel2(?string $Tel2): self
    {
        $this->Tel2 = $Tel2;

        return $this;
    }

    public function getTel3(): ?string
    {
        return $this->Tel3;
    }

    public function setTel3(?string $Tel3): self
    {
        $this->Tel3 = $Tel3;

        return $this;
    }

    public function getQuotientFamillial(): ?string
    {
        return $this->QuotientFamillial;
    }

    public function setQuotientFamillial(?string $QuotientFamillial): self
    {
        $this->QuotientFamillial = $QuotientFamillial;

        return $this;
    }

    /**
     * @return Collection<int, Eleve>
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleve $elefe): self
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves->add($elefe);
            $elefe->setEleve($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->removeElement($elefe)) {
            // set the owning side to null (unless already changed)
            if ($elefe->getEleve() === $this) {
                $elefe->setEleve(null);
            }
        }

        return $this;
    }
}
