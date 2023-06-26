<?php

namespace App\DataFixtures;

use App\Entity\DernierEmploiStage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DernierEmploiStageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            # code...

            $dernieremploi = new DernierEmploiStage();
            $dernieremploi->setCandidat($this->getReference("candidat" . $i));
            $dernieremploi->setAnnee(new \DateTime());
            $dernieremploi->setDuree(10);
            $dernieremploi->setNomEntreprise('kakan');
            $dernieremploi->setVille('Lyon');
            $dernieremploi->setPosteOccupe("");
            $manager->persist($dernieremploi);

            $manager->flush();
        }
    }
}
