<?php

namespace App\DataFixtures;

use App\Entity\UsersCCI;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersCCIFixtures extends Fixture
{
   
        private UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new UsersCCI();
        $user->setEmail('user@gmail.com');
        $password = $this->hasher->hashPassword($user, 'user');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();

        $admin = new UsersCCI();
        $admin->setEmail("admin@gmail.com");
        $password = $this->hasher->hashPassword($admin, "admin");
        $admin->setPassword($password);
        $admin->addRole("ROLE_ADMIN");
        $manager->persist($admin);
        $manager->flush();
    }
    }

