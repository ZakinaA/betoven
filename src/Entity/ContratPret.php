<?php

namespace App\Entity;

use App\Repository\ContratPretRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratPretRepository::class)]
class ContratPret
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(length: 255)]
    private ?string $attestationAssurance = null;

    #[ORM\Column(length: 255)]
    private ?string $etatDetailleDebut = null;

    #[ORM\Column(length: 255)]
    private ?string $etatDetailleRetour = null;

    #[ORM\OneToMany(mappedBy: 'contratPret', targetEntity: InterPret::class)]
    private Collection $interPrets;

    public function __construct()
    {
        $this->interPrets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getAttestationAssurance(): ?string
    {
        return $this->attestationAssurance;
    }

    public function setAttestationAssurance(string $attestationAssurance): self
    {
        $this->attestationAssurance = $attestationAssurance;

        return $this;
    }

    public function getEtatDetailleDebut(): ?string
    {
        return $this->etatDetailleDebut;
    }

    public function setEtatDetailleDebut(string $etatDetailleDebut): self
    {
        $this->etatDetailleDebut = $etatDetailleDebut;

        return $this;
    }

    public function getEtatDetailleRetour(): ?string
    {
        return $this->etatDetailleRetour;
    }

    public function setEtatDetailleRetour(string $etatDetailleRetour): self
    {
        $this->etatDetailleRetour = $etatDetailleRetour;

        return $this;
    }

    /**
     * @return Collection<int, InterPret>
     */
    public function getInterPrets(): Collection
    {
        return $this->interPrets;
    }

    public function addInterPret(InterPret $interPret): self
    {
        if (!$this->interPrets->contains($interPret)) {
            $this->interPrets->add($interPret);
            $interPret->setContratPret($this);
        }

        return $this;
    }

    public function removeInterPret(InterPret $interPret): self
    {
        if ($this->interPrets->removeElement($interPret)) {
            // set the owning side to null (unless already changed)
            if ($interPret->getContratPret() === $this) {
                $interPret->setContratPret(null);
            }
        }

        return $this;
    }
}
