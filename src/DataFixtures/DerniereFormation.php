<?php


namespace App\DataFixtures;

use DateTime;
use App\Entity\DerniereFormation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DerniereFormationfixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $derniereformation = new DerniereFormation();
            $derniereformation->setAnneeScolaire(new DateTime());
            $derniereformation->setClasseFrequentee('terminal'.$i);
            $derniereformation->setDiplomeObtenuOuEnCours('bac s '.$i);
            $derniereformation->setNomLocaliteEtablissement('lyon '.$i);
            $derniereformation->setCandidat($this->getReference("Candidat".$i));
            $manager->persist($derniereformation);
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
