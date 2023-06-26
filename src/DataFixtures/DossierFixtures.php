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

            $dosssier = new Dossier();
            $dosssier->setFormationInitiale("dev" . $i);
            $dosssier->setExperiencePro("dev" . $i);
            $dosssier->setCandidat($this->getReference("candidat" . rand(0, 4)));
            $dosssier->setThemFormationQuestions($this->getReference("themformaquestion" . rand(0, 4)));
            $dosssier->setPromosFormation($this->getReference("promoformation" . rand(1, 4)));
            $this->addReference("dossier" . $i, $dosssier);
            $manager->persist($dosssier);

            $manager->flush();
        }
    }

    public function getDependencies()
    {
        return [
            CandidatFixtures::class,
            ThemFormaQuestionsFixtures::class,
            PromoFormationFixtures::class
        ];
    }
    }

