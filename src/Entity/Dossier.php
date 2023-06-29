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

    #[ORM\ManyToOne(inversedBy: 'dossiers')]
    private ?Resultat $resultat = null;

    #[ORM\ManyToOne(inversedBy: 'dossiers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PromoFormation $promos_formation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ThemFormaQuestions $themformaquestions = null;

    #[ORM\ManyToOne(inversedBy: 'dossiers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidat $candidat = null;

    #[ORM\ManyToOne(inversedBy: 'dossiers')]
    private ?DerniereFormation $derniereformation = null;

    #[ORM\ManyToOne(inversedBy: 'dossiers')]
    private ?DernierEmploiStage $dernieremploi = null;

    #[ORM\ManyToOne(inversedBy: 'dossiers')]
    private ?Motivation $motivation = null;

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

    public function getResultat(): ?Resultat
    {
        return $this->resultat;
    }

    public function setResultat(?Resultat $resultat): static
    {
        $this->resultat = $resultat;

        return $this;
    }

    public function getPromosFormation(): ?PromoFormation
    {
        return $this->promos_formation;
    }

    public function setPromosFormation(?PromoFormation $promos_formation): static
    {
        $this->promos_formation = $promos_formation;

        return $this;
    }

    public function getThemformaquestions(): ?ThemFormaQuestions
    {
        return $this->themformaquestions;
    }

    public function setThemformaquestions(?ThemFormaQuestions $themformaquestions): static
    {
        $this->themformaquestions = $themformaquestions;

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

    public function getDerniereformation(): ?DerniereFormation
    {
        return $this->derniereformation;
    }

    public function setDerniereformation(?DerniereFormation $derniereformation): static
    {
        $this->derniereformation = $derniereformation;

        return $this;
    }

    public function getDernieremploi(): ?DernierEmploiStage
    {
        return $this->dernieremploi;
    }

    public function setDernieremploi(?DernierEmploiStage $dernieremploi): static
    {
        $this->dernieremploi = $dernieremploi;

        return $this;
    }

    public function getMotivation(): ?Motivation
    {
        return $this->motivation;
    }

    public function setMotivation(?Motivation $motivation): static
    {
        $this->motivation = $motivation;

        return $this;
    }
}
