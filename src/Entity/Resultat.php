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
}
