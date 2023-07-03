<?php

namespace App\Entity;

use App\Repository\QuestionRemplirRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRemplirRepository::class)]
class QuestionRemplir
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $detail = null;

    

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    #[ORM\Column(length: 255)]
    private ?string $detail_1 = null;

      #[ORM\Column(length: 255)]
    private ?string $reponse1 = null;

    #[ORM\Column(length: 255)]
    private ?string $detail2 = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse2 = null;

    #[ORM\Column(length: 255)]
    private ?string $detail3 = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse3 = null;

    #[ORM\Column(length: 255)]
    private ?string $detail4 = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse4 = null;

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

    

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDetail1(): ?string
    {
        return $this->detail_1;
    }


    public function setDetail1(string $detail_1): static
    {
        $this->detail_1 = $detail_1;

        return $this;
    }

   
    public function getReponse1(): ?string
    {
        return $this->reponse1;
    }

    public function setReponse1(string $reponse1): static
    {
        $this->reponse1 = $reponse1;

        return $this;
    }






    public function getDetail2(): ?string
    {
        return $this->detail2;
    }

    public function setDetail2(string $detail2): static
    {
        $this->detail2 = $detail2;

        return $this;
    }

   
  
    public function getReponse2(): ?string
    {
        return $this->reponse2;
    }

    public function setReponse2(string $reponse2): static
    {
        $this->reponse2 = $reponse2;

        return $this;
    }



    public function getDetail3(): ?string
    {
        return $this->detail3;
    }

    public function setDetail3(string $detail3): static
    {
        $this->detail3 = $detail3;

        return $this;
    }



    public function getReponse3(): ?string
    {
        return $this->reponse3;
    }

    public function setReponse3(string $reponse3): static
    {
        $this->reponse3 = $reponse3;

        return $this;
    }

    public function getDetail4(): ?string
    {
        return $this->detail4;
    }

    public function setDetail4(string $detail4): static
    {
        $this->detail4 = $detail4;

        return $this;
    }

    public function getReponse4(): ?string
    {
        return $this->reponse4;
    }

    public function setReponse4(string $reponse4): static
    {
        $this->reponse4 = $reponse4;

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
