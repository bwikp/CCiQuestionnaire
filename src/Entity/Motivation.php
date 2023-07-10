<?php

namespace App\Entity;

use App\Repository\MotivationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'motivation', targetEntity: Dossier::class)]
    private Collection $dossiers;

    public function __construct()
    {
        $this->dossiers = new ArrayCollection();
    }

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
            $dossier->setMotivation($this);
        }

        return $this;
    }

    public function removeDossier(Dossier $dossier): static
    {
        if ($this->dossiers->removeElement($dossier)) {
            // set the owning side to null (unless already changed)
            if ($dossier->getMotivation() === $this) {
                $dossier->setMotivation(null);
            }
        }

        return $this;
    }
    public function __toString()
        {
            $string = $this->getProjetProEtMotivation();
            return $string;
        }
}
