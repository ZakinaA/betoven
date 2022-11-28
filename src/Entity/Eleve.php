<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EleveRepository::class)]
class Eleve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Nom = null;

    #[ORM\Column(length: 50)]
    private ?string $Prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_Naiss = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    private ?Responsable $eleve = null;

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

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->Date_Naiss;
    }

    public function setDateNaiss(\DateTimeInterface $Date_Naiss): self
    {
        $this->Date_Naiss = $Date_Naiss;

        return $this;
    }

    public function getEleve(): ?Responsable
    {
        return $this->eleve;
    }

    public function setEleve(?Responsable $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }
}
