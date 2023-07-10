<?php

namespace App\DataFixtures;

use App\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PromotionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            # code...

            $promotion = new Promotion();
            $promotion->setNom("promo-" . $i);
            $this->addReference("promotion" . $i, $promotion);

            $manager->persist($promotion);
        }
        $manager->flush();
    }
}
