<?php

namespace App\DataFixtures;

use App\Entity\QuestionQcm;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionQCMFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            # code...

            $questionQCM = new QuestionQcm();
            $questionQCM->setChoix1('A');
            $questionQCM->setDetailChoix1("blabla");
            $questionQCM->setChoix2('B');
            $questionQCM->setDetailChoix2("blabla");
            $questionQCM->setChoix3('C');
            $questionQCM->setDetailChoix3("blabla");
            $questionQCM->setChoix4('C');
            $questionQCM->setDetailChoix4("blabla");
            $questionQCM->setReponse("B");
            $questionQCM->setType($this->getReference("type" . rand(1, 3)));

            $manager->persist($questionQCM);

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
