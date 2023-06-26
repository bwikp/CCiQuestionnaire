<?php

namespace App\DataFixtures;

use App\Entity\QuestionCorriger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestionCorrigeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            # code...

            $questioncorrige = new QuestionCorriger();
            $questioncorrige->setDetail("blablabla?");
            $questioncorrige->setReponse("balbla");
            $questioncorrige->setType($this->getReference("type" . rand(1, 3)));

            $manager->persist($questioncorrige);

            $manager->flush();
        }
    }
    public function getDependencies()
    {
        return [
            TypeFixtures::class,
        ];
    }
}
