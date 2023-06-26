<?php

namespace App\Entity;

use App\Repository\ThemFormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThemFormationRepository::class)]
class ThemFormation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'Thematique')]
    #[ORM\JoinColumn(nullable: false)]
    
    private ?Formation $formation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Thematique $thematique = null;

    #[ORM\OneToMany(mappedBy: 'Them_formations', targetEntity: ThemFormaQuestions::class)]
    private Collection $themFormaQuestions;

    public function __construct()
    {
        $this->themFormaQuestions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): static
    {
        $this->formation = $formation;

        return $this;
    }

    public function getThematique(): ?Thematique
    {
        return $this->thematique;
    }

    public function setThematique(?Thematique $thematique): static
    {
        $this->thematique = $thematique;

        return $this;
    }

    /**
     * @return Collection<int, ThemFormaQuestions>
     */
    public function getThemFormaQuestions(): Collection
    {
        return $this->themFormaQuestions;
    }

    public function addThemFormaQuestion(ThemFormaQuestions $themFormaQuestion): static
    {
        if (!$this->themFormaQuestions->contains($themFormaQuestion)) {
            $this->themFormaQuestions->add($themFormaQuestion);
            $themFormaQuestion->setThemFormations($this);
        }

        return $this;
    }

    public function removeThemFormaQuestion(ThemFormaQuestions $themFormaQuestion): static
    {
        if ($this->themFormaQuestions->removeElement($themFormaQuestion)) {
            // set the owning side to null (unless already changed)
            if ($themFormaQuestion->getThemFormations() === $this) {
                $themFormaQuestion->setThemFormations(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        $reponse = "Formation: ".$this->getFormation();
        return $reponse;
    }
}
