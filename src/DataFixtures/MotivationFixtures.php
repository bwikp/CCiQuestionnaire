<?php

namespace App\DataFixtures;

use App\Entity\Motivation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MotivationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 5; $i++){
            $motivation = new Motivation();
            $motivation->setProjetProEtMotivation('projet_motiv-'.$i);
            $motivation->setComprehensionSurLaFormation('ComprehensionSurLaFormation-'.$i);
            $motivation->setCandidat($this->getReference("Candidat". $i));
            $manager->persist($motivation);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            CandidatFixtures::class
        ];
    }
}
