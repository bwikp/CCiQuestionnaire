<?php

namespace App\Entity;

use App\Repository\ResultatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResultatRepository::class)]
class Resultat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $score_final = null;

    #[ORM\Column]
    private ?bool $is_admis = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreFinal(): ?string
    {
        return $this->score_final;
    }

    public function setScoreFinal(string $score_final): static
    {
        $this->score_final = $score_final;

        return $this;
    }

    public function isIsAdmis(): ?bool
    {
        return $this->is_admis;
    }

    public function setIsAdmis(bool $is_admis): static
    {
        $this->is_admis = $is_admis;

        return $this;
    }
}
