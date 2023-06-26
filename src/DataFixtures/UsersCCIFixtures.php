<?php

namespace App\DataFixtures;

use App\Entity\UsersCCI;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersCCIFixtures extends Fixture
{
<<<<<<< HEAD

    private UserPasswordHasherInterface $hasher;
=======
   
        private UserPasswordHasherInterface $hasher;
>>>>>>> c4f6cfa3bfd40c1c80b8bc1365f6a22f13fbbf92
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
<<<<<<< HEAD
}
=======
    }

>>>>>>> c4f6cfa3bfd40c1c80b8bc1365f6a22f13fbbf92
