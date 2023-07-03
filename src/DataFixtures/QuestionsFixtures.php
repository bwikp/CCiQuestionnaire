<?php

namespace App\DataFixtures;

use App\Entity\Questions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionsFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $question = new Questions();
            
    
            $this->addReference("question" . $i, $question);
            $manager->persist($question);
            $manager->flush();
        }
    }



}
