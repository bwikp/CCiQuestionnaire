<?php

namespace App\DataFixtures;

use App\Entity\Thematique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ThematiqueFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 6; $i++) {
            $thematique = new Thematique();
            $thematique->setDuree(10);
            $thematique->setNombreQuestion(5);
            $thematique->setNom("tata" . $i);
            $this->addReference("thematique" .$i, $thematique);
            $manager->persist($thematique);

            $manager->flush();
        }
    }
}
