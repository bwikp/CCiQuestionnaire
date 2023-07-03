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
        
        $questionremplir->setDetail1("blablabla?");
        $questionremplir->setReponse1("blabla");
        $questionremplir->setDetail2("blablabla?");
        $questionremplir->setReponse2("blabla");
        $questionremplir->setDetail3("blablabla?");
        $questionremplir->setReponse3("blabla");
        $questionremplir->setDetail4("blablabla?");
        $questionremplir->setReponse4("blabla");
        $questionremplir->setNote("blabla");
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
