<?php

namespace App\Entity;

use App\Repository\ResultatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResultatRepository::class)]
class Resultat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $Thematique1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $thematique2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $thematique3 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $thematique4 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $thematique5 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $score_final = null;

    #[ORM\Column]
    private ?bool $is_admis = null;

    #[ORM\ManyToOne(inversedBy: 'resultats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Dossier $dossier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThematique1(): ?string
    {
        return $this->Thematique1;
    }

    public function setThematique1(string $Thematique1): static
    {
        $this->Thematique1 = $Thematique1;

        return $this;
    }

    public function getThematique2(): ?string
    {
        return $this->thematique2;
    }

    public function setThematique2(string $thematique2): static
    {
        $this->thematique2 = $thematique2;

        return $this;
    }

    public function getThematique3(): ?string
    {
        return $this->thematique3;
    }

    public function setThematique3(string $thematique3): static
    {
        $this->thematique3 = $thematique3;

        return $this;
    }

    public function getThematique4(): ?string
    {
        return $this->thematique4;
    }

    public function setThematique4(string $thematique4): static
    {
        $this->thematique4 = $thematique4;

        return $this;
    }

    public function getThematique5(): ?string
    {
        return $this->thematique5;
    }

    public function setThematique5(string $thematique5): static
    {
        $this->thematique5 = $thematique5;

        return $this;
    }

    public function getScoreFinal(): ?string
    {
        return $this->score_final;
    }

    public function setScoreFinal(string $score_final): static
    {
        $this->score_final = $score_final;

        return $this;
    }

    public function isIsAdmis(): ?bool
    {
        return $this->is_admis;
    }

    public function setIsAdmis(bool $is_admis): static
    {
        $this->is_admis = $is_admis;

        return $this;
    }

    public function getDossier(): ?Dossier
    {
        return $this->dossier;
    }

    public function setDossier(?Dossier $dossier): static
    {
        $this->dossier = $dossier;

        return $this;
    }

    public function __toString()
    {
        $string = $this->getScoreFinal();
        return $string;
    }

}
