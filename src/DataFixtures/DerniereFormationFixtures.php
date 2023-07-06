<?php

namespace App\DataFixtures;

use App\Entity\DerniereFormation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DerniereFormationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $derniereformation = new DerniereFormation();
            $derniereformation->setAnneeScolaire(new \DateTime());
            $derniereformation->setClasseFrequentee("CP_ACP");
            $derniereformation->setDiplomeObtenuOuEnCours("DEV");
            $this->addReference("derniereformation" . $i, $derniereformation);
            $derniereformation->setNomLocaliteEtablissement("CCI-" . $i);
            $manager->persist($derniereformation);
        }


        $manager->flush();
    }
}
