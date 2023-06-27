<?php

namespace App\DataFixtures;

use App\Entity\Questions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class QuestionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 5; $i++){
            $question = new Questions();
            $question->setDetail('n ccjghsukdbfjhsdfjksdfg'.$i);
            $question->setImage('htto^s,njkfjjdf-'.$i);
            $question->setNote('15-'.$i);
            $question->setType($this->getReference("Type". $i));
            $manager->persist($question);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            TypeFixtures::class
        ];
    }
}
