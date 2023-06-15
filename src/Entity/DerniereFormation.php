<?php

namespace App\Entity;

use App\Repository\DerniereFormationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DerniereFormationRepository::class)]
class DerniereFormation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $annee_scolaire = null;

    #[ORM\Column(length: 255)]
    private ?string $classe_frequentee = null;

    #[ORM\Column(length: 255)]
    private ?string $diplome_obtenu_ou_en_cours = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_localite_etablissement = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidat $candidat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneeScolaire(): ?\DateTimeInterface
    {
        return $this->annee_scolaire;
    }

    public function setAnneeScolaire(\DateTimeInterface $annee_scolaire): static
    {
        $this->annee_scolaire = $annee_scolaire;

        return $this;
    }

    public function getClasseFrequentee(): ?string
    {
        return $this->classe_frequentee;
    }

    public function setClasseFrequentee(string $classe_frequentee): static
    {
        $this->classe_frequentee = $classe_frequentee;

        return $this;
    }

    public function getDiplomeObtenuOuEnCours(): ?string
    {
        return $this->diplome_obtenu_ou_en_cours;
    }

    public function setDiplomeObtenuOuEnCours(string $diplome_obtenu_ou_en_cours): static
    {
        $this->diplome_obtenu_ou_en_cours = $diplome_obtenu_ou_en_cours;

        return $this;
    }

    public function getNomLocaliteEtablissement(): ?string
    {
        return $this->nom_localite_etablissement;
    }

    public function setNomLocaliteEtablissement(string $nom_localite_etablissement): static
    {
        $this->nom_localite_etablissement = $nom_localite_etablissement;

        return $this;
    }

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidat $candidat): static
    {
        $this->candidat = $candidat;

        return $this;
    }
}
