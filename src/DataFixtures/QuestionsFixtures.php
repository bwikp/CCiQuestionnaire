<?php

namespace App\DataFixtures;

use App\Entity\Questions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestionsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $question = new Questions();
            $question->setDetail(("balblabla?"));
            $question->setImage("image");
            $question->setNote(1);
            $question->settype($this->getReference("type" . rand(1, 3)));
            $this->addReference("question" . $i, $question);
            $manager->persist($question);
            $manager->flush();
        }
    }


    public function getDependencies()
    {
        return [
            TypeFixtures::class
        ];
    }
}
