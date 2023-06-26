<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: ThemFormaQuestions::class)]
    private Collection $themFormaQuestions;

    public function __construct()
    {
        $this->themFormaQuestions = new ArrayCollection();
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
            $themFormaQuestion->setCategorie($this);
        }

        return $this;
    }

    public function removeThemFormaQuestion(ThemFormaQuestions $themFormaQuestion): static
    {
        if ($this->themFormaQuestions->removeElement($themFormaQuestion)) {
            // set the owning side to null (unless already changed)
            if ($themFormaQuestion->getCategorie() === $this) {
                $themFormaQuestion->setCategorie(null);
            }
        }

        return $this;
    }
}
