<?php

namespace App\Entity;

use App\Repository\DernierEmploiStageRepository;
use App\Entity\DerniereFormation;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DernierEmploiStageRepository::class)]
class DernierEmploiStage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE,nullable:true)]
    private ?\DateTimeInterface $annee = null ;

    #[ORM\Column(length: 255)]
    private ?string $duree = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_entreprise = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $poste_occupe = null;

    #[ORM\ManyToOne(inversedBy: 'dossier')]
    #[ORM\JoinColumn(nullable:false)]
    public ?Dossier $dossier_id = null;

    public function __construct()
    {
        // $this->dossier_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getAnnee(): ?string 
    {
        $time = $this->annee;
        $string = $time?->format('Y-m-d');
        return $string;
    }

    public function setAnnee(\DateTime $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nom_entreprise;
    }

    public function setNomEntreprise(string $nom_entreprise): static
    {
        $this->nom_entreprise = $nom_entreprise;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPosteOccupe(): ?string
    {
        return $this->poste_occupe;
    }

    public function setPosteOccupe(string $poste_occupe): static
    {
        $this->poste_occupe = $poste_occupe;

        return $this;
    }

    public function getDossierId(): ?Dossier
    {
        return $this->dossier_id;
    }

    public function setDossierId(?Dossier $dossier_id): static
    {
        $this->dossier_id = $dossier_id;

        return $this;
    }
    public function __toString()
    {
        $string = ".".$this->getNomEntreprise();
            return $string;
    }
}
