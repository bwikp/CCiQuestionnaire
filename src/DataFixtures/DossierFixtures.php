<?php

namespace App\DataFixtures;

use App\Entity\Dossier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class DossierFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $dossier = new Dossier();
            $dossier->setFormationInitiale("DEV" . $i);
            $dossier->setExperiencePro("DEV" . $i);
            $dossier->setCandidat($this->getReference("candidat" . rand(0, 4)));
            $dossier->setThemformaquestions($this->getReference("themformaquestion" . rand(0, 4)));
            $dossier->setPromosFormation($this->getReference("promoformation" . rand(1, 4)));
            $dossier->setMotivation($this->getReference("motivation" . rand(0, 4)));
            $dossier->setDernieremploi($this->getReference("dernieremploi" . rand(0, 4)));
            $dossier->setDerniereformation($this->getReference("derniereformation" . rand(0, 4)));
            $this->addReference("dossier" . $i, $dossier);
            $manager->persist($dossier);

            $manager->flush();
        }
    }

    public function getDependencies()
    {
        return [
            CandidatFixtures::class,
            ThemFormaQuestionsFixtures::class,
            PromoFormationFixtures::class,
            MotivationFixtures::class,
            DernierEmploiStageFixtures::class,
            DerniereFormationFixtures::class,
            // resultatFixtures::class
        ];
    }
}
