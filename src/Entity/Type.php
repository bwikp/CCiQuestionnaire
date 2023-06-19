<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'typey', targetEntity: QuestionCompleter::class)]
    private Collection $type;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: QuestionQcm::class)]
    private Collection $type_id;

    public function __construct()
    {
        $this->type = new ArrayCollection();
        $this->type_id = new ArrayCollection();
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
     * @return Collection<int, QuestionCompleter>
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(QuestionCompleter $type): static
    {
        if (!$this->type->contains($type)) {
            $this->type->add($type);
            $type->setType($this);
        }

        return $this;
    }

    public function removeType(QuestionCompleter $type): static
    {
        if ($this->type->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getType() === $this) {
                $type->setType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, QuestionQcm>
     */
    public function getTypeId(): Collection
    {
        return $this->type_id;
    }

    public function addTypeId(QuestionQcm $typeId): static
    {
        if (!$this->type_id->contains($typeId)) {
            $this->type_id->add($typeId);
            $typeId->setType($this);
        }

        return $this;
    }

    public function removeTypeId(QuestionQcm $typeId): static
    {
        if ($this->type_id->removeElement($typeId)) {
            // set the owning side to null (unless already changed)
            if ($typeId->getType() === $this) {
                $typeId->setType(null);
            }
        }

        return $this;
    }
}
