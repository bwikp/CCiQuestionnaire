<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
for ($i=0; $i <3 ; $i++) { 
    # code...
        $formation= new Formation();
        $formation->setNom("Formation".$i);
        $formation->setAnnee("10/12/2022");
        $this->addReference("formation" . $i, $formation);
        $manager->persist($formation);

        $manager->flush();
    }
    }
}
