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

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidat $candidat = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ThemFormaQuestions $them_forma_question = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?PromoFormation $promo_formation = null;

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

    public function getThemFormaQuestion(): ?ThemFormaQuestions
    {
        return $this->them_forma_question;
    }

    public function setThemFormaQuestion(?ThemFormaQuestions $them_forma_question): static
    {
        $this->them_forma_question = $them_forma_question;

        return $this;
    }

    public function getPromoFormation(): ?PromoFormation
    {
        return $this->promo_formation;
    }

    public function setPromoFormation(?PromoFormation $promo_formation): static
    {
        $this->promo_formation = $promo_formation;

        return $this;
    }
}
