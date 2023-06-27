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
            $derniereformation->setCandidat($this->getReference("candidat" . rand(1, 4)));
            $derniereformation->setAnneeScolaire(new \DateTime());
            $derniereformation->setClasseFrequentee("CP_ACP");
            $derniereformation->setDiplomeObtenuOuEnCours("DEV");
            $derniereformation->setNomLocaliteEtablissement("CCI-" . $i);
            $manager->persist($derniereformation);
        }


        $manager->flush();
    }
}
