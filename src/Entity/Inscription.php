<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nombreDePaiements = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreDePaiements(): ?int
    {
        return $this->nombreDePaiements;
    }

    public function setNombreDePaiements(int $nombreDePaiements): self
    {
        $this->nombreDePaiements = $nombreDePaiements;

        return $this;
    }
}
