<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\QuestionQcmRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: QuestionQcmRepository::class)]
#[Vich\Uploadable]
class QuestionQcm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // #[ORM\Column(length: 255)]
    // private $image;

    #[ORM\Column(length: 255)]
    private ?string $detail = null;

    #[ORM\Column(length: 255)]
    private ?string $choix1 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $detail_choix1 = null;

    #[ORM\Column(length: 255)]
    private ?string $choix2 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $detail_choix2 = null;

    #[ORM\Column(length: 255)]
    private ?string $choix3 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $detail_choix3 = null;

    #[ORM\Column(length: 255)]
    private ?string $choix4 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $detail_choix4 = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;


    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $note = null;

    #[Vich\UploadableField(mapping: 'products', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function getImage():string
    // {
    //     return $this->image;
    // }

    // public function setImage(string $image): self
    // {
    //     $this->image = $image;

    //     return $this;
    // }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): static
    {
        $this->detail = $detail;

        return $this;
    }

    public function getChoix1(): ?string
    {
        return $this->choix1;
    }

    public function setChoix1(string $choix1): static
    {
        $this->choix1 = $choix1;

        return $this;
    }

    public function getDetailChoix1(): ?string
    {
        return $this->detail_choix1;
    }

    public function setDetailChoix1(string $detail_choix1): static
    {
        $this->detail_choix1 = $detail_choix1;

        return $this;
    }

    public function getChoix2(): ?string
    {
        return $this->choix2;
    }

    public function setChoix2(string $choix2): static
    {
        $this->choix2 = $choix2;

        return $this;
    }

    public function getDetailChoix2(): ?string
    {
        return $this->detail_choix2;
    }

    public function setDetailChoix2(string $detail_choix2): static
    {
        $this->detail_choix2 = $detail_choix2;

        return $this;
    }

    public function getChoix3(): ?string
    {
        return $this->choix3;
    }

    public function setChoix3(string $choix3): static
    {
        $this->choix3 = $choix3;

        return $this;
    }

    public function getDetailChoix3(): ?string
    {
        return $this->detail_choix3;
    }

    public function setDetailChoix3(string $detail_choix3): static
    {
        $this->detail_choix3 = $detail_choix3;

        return $this;
    }

    public function getChoix4(): ?string
    {
        return $this->choix4;
    }

    public function setChoix4(string $choix4): static
    {
        $this->choix4 = $choix4;

        return $this;
    }

    public function getDetailChoix4(): ?string
    {
        return $this->detail_choix4;
    }

    public function setDetailChoix4(string $detail_choix4): static
    {
        $this->detail_choix4 = $detail_choix4;

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

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }
}
