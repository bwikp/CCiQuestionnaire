<?php

namespace App\DataFixtures;

use App\Entity\Candidat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CandidatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        # code...
        for ($i = 0; $i < 5; $i++) {
            # code...

            $candidat = new Candidat();
            $candidat->setnom('Lamin-' . $i);
            $candidat->setPrenom('Moha');
            $candidat->setMail('moha@gmail.com');
            $candidat->setGenre('Homme');
            $candidat->setAdresse('33 rue de ...');
            $candidat->setVille('Lyon');
            $candidat->setCodePostal('69800');
            $candidat->setTelephoneFixe('');
            $candidat->setTelephonePortable("07-82-14-15-16");
            $this->addReference("candidat" . $i, $candidat);
            $manager->persist($candidat);
            $manager->flush();
        }
    }
}
