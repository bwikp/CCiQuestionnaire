<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\DernierEmploiStage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DernierEmploiStageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $dernieremploistage = new DernierEmploiStage();
            $dernieremploistage->setAnnee(new DateTime());
            $dernieremploistage->setDuree('2 ans' . $i);
            $dernieremploistage->setNomEntreprise('cci ' . $i);
            $dernieremploistage->setVille('lyon ' . $i);
            $dernieremploistage->setPosteOccupe('ingenieur ' . $i);
            $dernieremploistage->setCandidat($this->getReference("Candidat" . $i));
            $manager->persist($dernieremploistage);
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
