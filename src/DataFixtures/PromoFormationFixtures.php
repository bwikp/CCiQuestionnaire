<?php

namespace App\DataFixtures;

use App\Entity\PromoFormation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class PromoFormationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 3; $i++) {
        $promoformation = new PromoFormation();
        $this->addReference("promoformation". $i, $promoformation);
        $promoformation->setFormation($this->getReference("Formation". rand(0,2)));
        $promoformation->setPromotion($this->getReference("Promotion". rand(0,2)));
        $manager->persist($promoformation);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            FormationFixtures::class,
            PromotionFixtures::class
        ];
    }
}
