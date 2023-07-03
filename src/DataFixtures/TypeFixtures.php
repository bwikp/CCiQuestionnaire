<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 4; $i++) {
            $type = new Type();
            $type->setNom("type" . $i);
            $this->addReference("type" . $i, $type);
            $type->setQuestion($this->getReference("question" . rand(0, 9)));
            $manager->persist($type);
            $manager->flush();
        }
    }
    public function getDependencies()
    {
        return [
            QuestionsFixtures::class
        ];
    }
}
