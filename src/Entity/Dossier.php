<?php

namespace App\Entity;

use App\Repository\DossierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DossierRepository::class)]
class Dossier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $formation_initiale = null;

    #[ORM\Column(length: 255)]
    private ?string $experience_pro = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormationInitiale(): ?string
    {
        return $this->formation_initiale;
    }

    public function setFormationInitiale(string $formation_initiale): static
    {
        $this->formation_initiale = $formation_initiale;

        return $this;
    }

    public function getExperiencePro(): ?string
    {
        return $this->experience_pro;
    }

    public function setExperiencePro(string $experience_pro): static
    {
        $this->experience_pro = $experience_pro;

        return $this;
    }
}
