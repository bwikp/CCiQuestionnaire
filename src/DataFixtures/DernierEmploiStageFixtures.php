<?php

namespace App\DataFixtures;

use App\Entity\DernierEmploiStage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DernierEmploiStageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            # code...

            $dernieremploi = new DernierEmploiStage();
            $dernieremploi->setAnnee(new \DateTime());
            $dernieremploi->setDuree(10);
            $dernieremploi->setNomEntreprise('kakan');
            $dernieremploi->setVille('Lyon');
            $dernieremploi->setPosteOccupe("Poste".$i);
            $dernieremploi->setDossierId($this->getReference("dossier".$i));
            // $this->addReference("dernieremploi" . $i, $dernieremploi);
            $manager->persist($dernieremploi);

            $manager->flush();
        }
    }

    public function getDependencies()
        {
            return [
                DossierFixtures::class,
            ];
        }
}
