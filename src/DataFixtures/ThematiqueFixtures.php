<?php

namespace App\DataFixtures;

<<<<<<< HEAD
use App\Entity\Thematique;
=======
>>>>>>> c4f6cfa3bfd40c1c80b8bc1365f6a22f13fbbf92
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
<<<<<<< HEAD

            $manager->flush();
        }
=======
        }
        $manager->flush();
>>>>>>> c4f6cfa3bfd40c1c80b8bc1365f6a22f13fbbf92
    }
}
