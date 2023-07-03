<?php

namespace App\Entity;

use App\Repository\ResultatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResultatRepository::class)]
class Resultat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $score_final = null;

    #[ORM\Column]
    private ?bool $is_admis = null;

    #[ORM\OneToMany(mappedBy: 'resultat', targetEntity: Dossier::class)]
    private Collection $dossiers;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $thematique1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $thematique2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $thematique3 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $thematique4 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $thematique5 = null;

    public function __construct()
    {
        $this->dossiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreFinal(): ?string
    {
        return $this->score_final;
    }

    public function setScoreFinal(?string $score_final): static
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

    /**
     * @return Collection<int, Dossier>
     */
    public function getDossiers(): Collection
    {
        return $this->dossiers;
    }

    public function addDossier(Dossier $dossier): static
    {
        if (!$this->dossiers->contains($dossier)) {
            $this->dossiers->add($dossier);
            $dossier->setResultat($this);
        }

        return $this;
    }

    public function removeDossier(Dossier $dossier): static
    {
        if ($this->dossiers->removeElement($dossier)) {
            // set the owning side to null (unless already changed)
            if ($dossier->getResultat() === $this) {
                $dossier->setResultat(null);
            }
        }

        return $this;
    }

    public function getThematique1(): ?string
    {
        return $this->thematique1;
    }

    public function setThematique1(string $thematique1): static
    {
        $this->thematique1 = $thematique1;

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

    public function __toString()
    {
        $reponse = "" . $this->getDossiers();
        return $reponse;
    }
}
