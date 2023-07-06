<?php

namespace App\DataFixtures;

use App\Entity\Resultat;
use Doctrine\Bundle\FixturesBundle\Fixture;
<<<<<<< HEAD
use Doctrine\Persistence\ObjectManager;

class ResultatFixtures extends Fixture
=======
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ResultatFixtures extends Fixture implements DependentFixtureInterface
>>>>>>> 80e0cfa8a4a3ac17105a7cc4b9bb9b43c3857a9d
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
<<<<<<< HEAD
=======
            $resultat->setDossier($this->getReference("dossier" . $i));
>>>>>>> 80e0cfa8a4a3ac17105a7cc4b9bb9b43c3857a9d
            $this->addReference("resultat" . $i, $resultat);
            $manager->persist($resultat);
            $manager->flush();
        }
    }
<<<<<<< HEAD
=======
    public function getDependencies()
    {
        return [
            DossierFixtures::class
        ];
    }
>>>>>>> 80e0cfa8a4a3ac17105a7cc4b9bb9b43c3857a9d
}
