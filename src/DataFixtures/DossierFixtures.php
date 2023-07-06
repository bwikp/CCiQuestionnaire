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
            $dossier->setCandidat($this->getReference("candidat".$i));
            $dossier->setThemformaquestions($this->getReference("themformaquestion" .$i));
            $dossier->setPromosFormation($this->getReference("promoformation" .$i));
            $dossier->setMotivation($this->getReference("motivation" .$i));
            $dossier->setDerniereformation($this->getReference("derniereformation" . $i));
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
            DerniereFormationFixtures::class,
            // ResultatFixtures::class
        ];
    }
}
