<?php

namespace App\DataFixtures;

use App\Entity\Candidat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

<<<<<<< HEAD
=======

>>>>>>> c4f6cfa3bfd40c1c80b8bc1365f6a22f13fbbf92
class CandidatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
<<<<<<< HEAD
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
=======
        for($i = 1; $i <= 5; $i++){
            $candidat = new Candidat();
            $candidat->setNom('nom-'.$i);
            $candidat->setPrenom('prenom-'.$i);
            $candidat->setMail('candidat@candidat.'.$i);
            $candidat->setGenre('homme-'.$i);
            $candidat->setAdresse('2 rue papa-'.$i);
            $candidat->setville('Lyon-'.$i);
            $candidat->setCodePostal('69800-'.$i);
            $candidat->setTelephoneFixe('0450120404-'.$i);
            $candidat->setTelephonePortable('0625362514-'.$i);
            $manager->persist($candidat);
            $this->addReference("Candidat".$i, $candidat);
        }

        $manager->flush();
    }
  
>>>>>>> c4f6cfa3bfd40c1c80b8bc1365f6a22f13fbbf92
}
