<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionsRepository::class)]
class Questions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $detail = null;

    #[ORM\Column(type: Types::BLOB)]
    private $image = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $note = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    #[ORM\OneToMany(mappedBy: 'Questions', targetEntity: ThemFormaQuestions::class)]
    private Collection $themFormaQuestions;

    public function __construct()
    {
        $this->themFormaQuestions = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): static
    {
        $this->detail = $detail;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

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
            $themFormaQuestion->setQuestions($this);
        }

        return $this;
    }

    public function removeThemFormaQuestion(ThemFormaQuestions $themFormaQuestion): static
    {
        if ($this->themFormaQuestions->removeElement($themFormaQuestion)) {
            // set the owning side to null (unless already changed)
            if ($themFormaQuestion->getQuestions() === $this) {
                $themFormaQuestion->setQuestions(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        $reponse = "".$this->getDetail();
        return $reponse;
    }
}
