<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
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
    }
}
