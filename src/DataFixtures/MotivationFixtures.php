<?php

namespace App\DataFixtures;

use App\Entity\Motivation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MotivationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i <5 ; $i++) { 
                        
        $motivation = new Motivation();
        $motivation->setCandidat($this->getReference("candidat".$i));
        $motivation->setProjetProEtMotivation("hahahahaha yivuvbika ophbpcz");
        $motivation->setComprehensionSurLaFormation("lnklnsldnvp*dnl  boùs^hùs flnù");
        $manager->persist($motivation);
        $manager->flush();
    }
}

    public function getDependencies()
    {
        return [
            CandidatFixtures::class
        ];
    }
}
