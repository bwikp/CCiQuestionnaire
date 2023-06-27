<?php

namespace App\Entity;

use App\Repository\DossierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use LDAP\Result;

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

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidat $candidat = null;



    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?PromoFormation $promos_formation = null;

    #[ORM\ManyToOne(inversedBy: 'dossiers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ThemFormaQuestions $ThemFormationQuestions = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $annee = null;

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

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidat $candidat): static
    {
        $this->candidat = $candidat;

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

    public function getThemFormationQuestions(): ?ThemFormaQuestions
    {
        return $this->ThemFormationQuestions;
    }

    public function setThemFormationQuestions(?ThemFormaQuestions $ThemFormationQuestions): static
    {
        $this->ThemFormationQuestions = $ThemFormationQuestions;

        return $this;
    }
    public function __toString()
    {
        $reponse = "id: " . $this->getId() . "candidat " . $this->getCandidat();
        return $reponse;
    }

    public function getAnnee(): ?string
    {
        $annee = "'" . $this->annee . "'";
        return $annee;
    }

    public function setAnnee(\DateTimeInterface $annee): static
    {
        $this->annee = $annee;

        return $this;
    }
}
