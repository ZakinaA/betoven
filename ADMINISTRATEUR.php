<?php

namespace App\Entity;

use App\Repository\ADMINISTRATEURRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ADMINISTRATEURRepository::class)]
class ADMINISTRATEUR
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
