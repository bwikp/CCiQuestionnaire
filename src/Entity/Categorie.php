<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
<<<<<<< HEAD
    private ?string $Nom = null;
=======
    private ?string $nom = null;
>>>>>>> 1a33906cfcef83b03a62c5bfabf37433b9cc5e1c

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
<<<<<<< HEAD
        $this->Nom = $Nom;
=======
        $this->nom = $nom;
>>>>>>> 1a33906cfcef83b03a62c5bfabf37433b9cc5e1c

        return $this;
    }
}
