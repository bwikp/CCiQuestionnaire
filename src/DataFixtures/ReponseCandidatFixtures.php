<?php

namespace App\DataFixtures;

use App\Entity\ReponseCandidat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ReponseCandidatFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 50; $i++) {
            $reponsecandidat = new ReponseCandidat();
            $reponsecandidat->setReponseCandidat("balbla-" . $i);
            $reponsecandidat->setNote(1);
            $reponsecandidat->setQuestions($this->getReference("question" . rand(0, 9)));
            $reponsecandidat->setDossier($this->getReference("dossier" . rand(0, 4)));
            $manager->persist($reponsecandidat);

            $manager->flush();
        }
    }
    public function getDependencies()
    {
        return [
            QuestionsFixtures::class,
            DossierFixtures::class
        ];
    }
}
