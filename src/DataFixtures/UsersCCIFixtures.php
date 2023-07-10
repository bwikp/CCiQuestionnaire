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
    
    for($i = 0 ; $i < 5 ; $i++)
    {
        $user = new UsersCCI();
        $user->setEmail('user'.$i.'@gmail.com');
        $password = $this->hasher->hashPassword($user, 'user'.$i);
        $user->setPassword($password);
        $this->addReference("user".$i,$user);
        $manager->persist($user);
        $manager->flush();

        $admin = new UsersCCI();
        $admin->setEmail("admin".$i."@gmail.com");
        $password = $this->hasher->hashPassword($admin, "admin".$i);
        $admin->setPassword($password);
        // $admin->addRole("ROLE_ADMIN");
        $this->addReference("admin".$i,$admin);
        $manager->persist($admin);
        $manager->flush();
    }
  }
}
