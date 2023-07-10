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


     #[ORM\ManyToOne(inversedBy: 'types')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    // #[ORM\Column(type: Types::TEXT)]
    // private ?string $detail = null;

    // #[ORM\Column(type: Types::BLOB)]
    // private $image = null;

    // #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    // private ?string $note = null;

    #[ORM\OneToMany(mappedBy: 'Questions', targetEntity: ThemFormaQuestions::class)]
    private Collection $themFormaQuestions;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: Type::class)]
    private Collection $types;

    public function __construct()
    {
        $this->themFormaQuestions = new ArrayCollection();
        $this->types = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    // public function getDetail(): ?string
    // {
    //     return $this->detail;
    // }

    // public function setDetail(string $detail): static
    // {
    //     $this->detail = $detail;

    //     return $this;
    // }

    // public function getImage()
    // {
    //     return $this->image;
    // }

    // public function setImage($image): static
    // {
    //     $this->image = $image;

    //     return $this;
    // }

    // public function getNote(): ?string
    // {
    //     return $this->note;
    // }

    // public function setNote(string $note): static
    // {
    //     $this->note = $note;

    //     return $this;
    // }

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
    // public function __toString()
    // {
    //     $reponse = "".$this->getDetail();
    //     return $reponse;
    // }

    /**
     * @return Collection<int, Type>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    // public function addType(Type $type): static
    // {
    //     if (!$this->types->contains($type)) {
    //         $this->types->add($type);
    //         $type->setQuestion($this);
    //     }

    //     return $this;
    // }

    // public function removeType(Type $type): static
    // {
    //     if ($this->types->removeElement($type)) {
    //         // set the owning side to null (unless already changed)
    //         if ($type->getQuestion() === $this) {
    //             $type->setQuestion(null);
    //         }
    //     }

    //     return $this;
    // }
    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }
    // public function __toString(){
    //     $result= $this->id ;
    //     return $result;
    // }
}