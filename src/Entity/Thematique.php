<?php

namespace App\Entity;

use App\Repository\ThematiqueRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThematiqueRepository::class)]
class Thematique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: '0', nullable: true)]
    private ?string $duree = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: '0', nullable: true)]
    private ?string $nombre_question = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getNombreQuestion(): ?string
    {
        return $this->nombre_question;
    }

    public function setNombreQuestion(?string $nombre_question): static
    {
        $this->nombre_question = $nombre_question;

        return $this;
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
}
