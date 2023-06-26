<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\ThemFormaQuestions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ThemFormaQuestionsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $themformaquestions = new ThemFormaQuestions();
            $this->addReference("themformaquestion" . $i, $themformaquestions);
            $themformaquestions->setQuestions($this->getReference("question" . rand(1, 9)));
            $themformaquestions->setThemFormations($this->getReference("themformation" . $i));
            $themformaquestions->setCategorie($this->getReference("categorie" . rand(0, 4)));
            $manager->persist($themformaquestions);
            $manager->flush();
        }
    }
    public function getDependencies()
    {
        return [
            QuestionsFixtures::class,
            ThemFormationFixtures::class,
            CategorieFixtures::class
        ];
    }
}
