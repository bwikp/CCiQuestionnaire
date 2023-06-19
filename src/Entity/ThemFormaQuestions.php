<?php

namespace App\Entity;

use App\Repository\ThemFormaQuestionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThemFormaQuestionsRepository::class)]
class ThemFormaQuestions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Questions $questions = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ThemFormation $them_formations = null;

    public function getId(): ?int
    {
        return $this->id;
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
}
