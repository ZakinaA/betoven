<?php

namespace App\Entity;

use App\Repository\TranchesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TranchesRepository::class)]
class Tranches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quotientMin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuotientMin(): ?int
    {
        return $this->quotientMin;
    }

    public function setQuotientMin(int $quotientMin): self
    {
        $this->quotientMin = $quotientMin;

        return $this;
    }
}
