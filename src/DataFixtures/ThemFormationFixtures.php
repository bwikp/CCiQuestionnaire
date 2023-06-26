<?php

namespace App\DataFixtures;

use App\Entity\ThemFormation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ThemFormationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $themformation = new ThemFormation();
            $this->addReference("themformation" . $i, $themformation);
            $themformation->setThematique($this->getReference("thematique" . rand(0, 5)));
            $themformation->setFormation($this->getReference("formation" . rand(0, 2)));
            $manager->persist($themformation);
            $manager->flush();
        }
    }

    public function getDependencies()
    {
        return [
            FormationFixtures::class,
            ThematiqueFixtures::class
        ];
    }
}
