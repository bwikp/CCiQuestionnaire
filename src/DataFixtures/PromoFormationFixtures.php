<?php

namespace App\DataFixtures;


use App\Entity\PromoFormation;
use App\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PromoFormationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            # code...
            $promoformation = new PromoFormation();
            $this->addReference("promoformation". $i, $promoformation);
            $promoformation->setFormation($this->getReference("formation" . rand(0, 2)));
            $promoformation->setPromotion($this->getReference("promotion" . rand(0, 2)));
            $manager->persist($promoformation);

            $manager->flush();
        }
    }

    public function getDependencies()
    {
        return [
            FormationFixtures::class,
            PromotionFixtures::class
        ];
    }
}
