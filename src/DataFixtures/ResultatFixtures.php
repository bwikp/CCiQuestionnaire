<?php

namespace App\DataFixtures;

use App\Entity\Resultat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ResultatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $resultat = new Resultat();
            $resultat->setScoreFinal(15);
            $resultat->setIsAdmis(1);
            $this->addReference("resultat" . $i, $resultat);
            $manager->persist($resultat);
            $manager->flush();
        }
    }
}
