<?php

namespace App\DataFixtures;

use App\Entity\Candidat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CandidatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
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
  
}
