<?php

namespace App\Entity;

use App\Repository\ChoixRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChoixRepository::class)]
class Choix
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $choix = null;

    #[ORM\Column(length: 255)]
    private ?string $detail = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $reponse = null;

    #[ORM\ManyToOne(inversedBy: 'choixes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?QuestionQcm $QuestionQCM = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChoix(): ?string
    {
        return $this->choix;
    }

    public function setChoix(string $choix): static
    {
        $this->choix = $choix;

        return $this;
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

    public function getReponse(): ?int
    {
        return $this->reponse;
    }

    public function setReponse(int $reponse): static
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getQuestionQCM(): ?QuestionQcm
    {
        return $this->QuestionQCM;
    }

    public function setQuestionQCM(?QuestionQcm $QuestionQCM): static
    {
        $this->QuestionQCM = $QuestionQCM;

        return $this;
    }
}
