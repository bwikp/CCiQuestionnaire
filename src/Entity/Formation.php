<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use PHPUnit\TestFixture\ClassWithNonPublicAttributes;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $annee = null;

    #[ORM\OneToMany(mappedBy: 'formation', targetEntity: ThemFormation::class)]
    private Collection $thematique;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    public function __construct()
    {
        $this->thematique = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * @return Collection<int, ThemFormation>
     */
    public function getThematique(): Collection
    {
        return $this->thematique;
    }

    public function addThematique(ThemFormation $thematique): static
    {
        if (!$this->thematique->contains($thematique)) {
            $this->thematique->add($thematique);
            $thematique->setFormation($this);
        }

        return $this;
    }

    public function removeThematique(ThemFormation $thematique): static
    {
        if ($this->thematique->removeElement($thematique)) {
            // set the owning side to null (unless already changed)
            if ($thematique->getFormation() === $this) {
                $thematique->setFormation(null);
            }
        }

        return $this;
    }
    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }
    public function __toString()
    {
        $reponse = "".$this->getNom();
        return $reponse;
    }

    
}
