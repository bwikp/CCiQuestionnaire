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
        for ($j = 1; $j <= 1; $j++) {
            $derniereformation = new DerniereFormation();
            $derniereformation->setAnneeScolaire(new DateTime());
            $derniereformation->setClasseFrequentee('terminal'.$j);
            $derniereformation->setDiplomeObtenuOuEnCours('bac s '.$j);
            $derniereformation->setNomLocaliteEtablissement('lyon '.$j);
            $derniereformation->setCandidat($this->getReference("Candidat". $j));
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
