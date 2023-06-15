<?php

namespace App\Entity;

use App\Repository\MotivationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MotivationRepository::class)]
class Motivation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $projet_pro_et_motivation = null;

    #[ORM\Column(length: 255)]
    private ?string $comprehension_sur_la_formation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidat $candidat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjetProEtMotivation(): ?string
    {
        return $this->projet_pro_et_motivation;
    }

    public function setProjetProEtMotivation(string $projet_pro_et_motivation): static
    {
        $this->projet_pro_et_motivation = $projet_pro_et_motivation;

        return $this;
    }

    public function getComprehensionSurLaFormation(): ?string
    {
        return $this->comprehension_sur_la_formation;
    }

    public function setComprehensionSurLaFormation(string $comprehension_sur_la_formation): static
    {
        $this->comprehension_sur_la_formation = $comprehension_sur_la_formation;

        return $this;
    }

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidat $candidat): static
    {
        $this->candidat = $candidat;

        return $this;
    }
}
