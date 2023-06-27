<?php

namespace App\Entity;

use App\Repository\ThemFormaQuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThemFormaQuestionsRepository::class)]
class ThemFormaQuestions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'ThemFormaQuestions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Questions $questions = null;

    #[ORM\ManyToOne(inversedBy: 'ThemFormaQuestions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ThemFormation $them_formations = null;

    #[ORM\OneToMany(mappedBy: 'ThemFormationQuestions', targetEntity: Dossier::class)]
    private Collection $dossiers;

    #[ORM\ManyToOne]
    private ?Categorie $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function __construct()
    {
        $this->dossiers = new ArrayCollection();
    }

    public function getQuestions(): ?Questions
    {
        return $this->questions;
    }

    public function setQuestions(?Questions $questions): static
    {
        $this->questions = $questions;

        return $this;
    }

    public function getThemFormations(): ?ThemFormation
    {
        return $this->them_formations;
    }

    public function setThemFormations(?ThemFormation $them_formations): static
    {
        $this->them_formations = $them_formations;

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
            $dossier->setThemFormationQuestions($this);
        }

        return $this;
    }

    public function removeDossier(Dossier $dossier): static
    {
        if ($this->dossiers->removeElement($dossier)) {
            // set the owning side to null (unless already changed)
            if ($dossier->getThemFormationQuestions() === $this) {
                $dossier->setThemFormationQuestions(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        $reponse = "them".$this->getThemFormations();
        return $reponse;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;
        return $this;
    }
    
}
