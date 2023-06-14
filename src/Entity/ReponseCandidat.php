<?php

namespace App\Entity;

use App\Repository\ReponseCandidatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseCandidatRepository::class)]
class ReponseCandidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse_candidat = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $note = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReponseCandidat(): ?string
    {
        return $this->reponse_candidat;
    }

    public function setReponseCandidat(string $reponse_candidat): static
    {
        $this->reponse_candidat = $reponse_candidat;

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