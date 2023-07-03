<?php

namespace App\Entity;

use App\Repository\QuestionCorrigerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionCorrigerRepository::class)]
class QuestionCorriger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $detail = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $detailText = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $note = null;

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
    public function getDetailText(): ?string
    {
        return $this->detailText;
    }

    public function setDetailText(string $detailText): static
    {
        $this->detailText = $detailText;

        return $this;
    }


    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(string $reponse): static
    {
        $this->reponse = $reponse;

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

   
    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): static
    {
        $this->note = $note;

        return $this;
    }
}
