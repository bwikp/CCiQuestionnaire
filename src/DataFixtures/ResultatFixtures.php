<?php

namespace App\DataFixtures;

use App\Entity\Resultat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ResultatFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $resultat = new Resultat();
            $resultat->setIsAdmis(1);
            $resultat->setThematique1(12);
            $resultat->setThematique2(12);
            $resultat->setThematique3(12);
            $resultat->setThematique4(12);
            $resultat->setThematique5(12);
            $resultat->setScoreFinal(15);
            $resultat->setDossier($this->getReference("dossier" . $i));
            $this->addReference("resultat" . $i, $resultat);
            $manager->persist($resultat);
            $manager->flush();
        }
    }
}
