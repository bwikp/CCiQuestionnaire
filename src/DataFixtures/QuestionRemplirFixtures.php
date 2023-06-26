<?php

namespace App\DataFixtures;

use App\Entity\QuestionRemplir;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestionRemplirFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $questionremplir = new QuestionRemplir();
        $questionremplir->setDetail("blablabla?");
        $questionremplir->setReponse("blabla");
        $questionremplir->setType($this->getReference("type" . rand(1, 3)));
        $manager->persist($questionremplir);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            TypeFixtures::class,
        ];
    }
}
