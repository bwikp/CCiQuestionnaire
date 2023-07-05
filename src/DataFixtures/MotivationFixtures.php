<?php

namespace App\DataFixtures;

use App\Entity\Motivation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MotivationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {

            $motivation = new Motivation();
            $motivation->setProjetProEtMotivation("hahahahaha yivuvbika ophbpcz");
            $motivation->setComprehensionSurLaFormation("lnklnsldnvp*dnl  boùs^hùs flnù");
            $this->addReference("motivation" . $i, $motivation);
            $manager->persist($motivation);
            $manager->flush();
        }
    }
}
