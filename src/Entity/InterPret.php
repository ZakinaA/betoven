<?php

namespace App\Entity;

use App\Repository\InterPretRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterPretRepository::class)]
class InterPret
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quotite = null;

    #[ORM\ManyToOne(inversedBy: 'interPrets')]
    private ?Intervention $intervention = null;

    #[ORM\ManyToOne(inversedBy: 'interPrets')]
    private ?ContratPret $contratPret = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuotite(): ?int
    {
        return $this->quotite;
    }

    public function setQuotite(int $quotite): self
    {
        $this->quotite = $quotite;

        return $this;
    }

    public function getIntervention(): ?Intervention
    {
        return $this->intervention;
    }

    public function setIntervention(?Intervention $intervention): self
    {
        $this->intervention = $intervention;

        return $this;
    }

    public function getContratPret(): ?ContratPret
    {
        return $this->contratPret;
    }

    public function setContratPret(?ContratPret $contratPret): self
    {
        $this->contratPret = $contratPret;

        return $this;
    }
}
