<?php

namespace App\DataFixtures;

<<<<<<< HEAD
use App\Entity\Categorie;
=======
>>>>>>> c4f6cfa3bfd40c1c80b8bc1365f6a22f13fbbf92
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            # code...

            $categorie = new Categorie();
            $categorie->setNom("CAT" . $i);
            $this->addReference("categorie" . $i, $categorie);
            $manager->persist($categorie);

            $manager->flush();
        }
<<<<<<< HEAD
    }
=======
}
>>>>>>> c4f6cfa3bfd40c1c80b8bc1365f6a22f13fbbf92
}
