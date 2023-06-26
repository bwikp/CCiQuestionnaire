<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 4; $i++) {
            $type = new Type();
            $type->setNom("type");
            $this->addReference("type" . $i, $type);
            $manager->persist($type);
            $manager->flush();
        }
    }
}
