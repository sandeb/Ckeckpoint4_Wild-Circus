<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
     private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        // Un user
        $subscriber = new User();
        $subscriber->setEmail('subscriber@user.com');
        $subscriber->setRoles(['ROLE_USER']);
        $subscriber->setPassword($this->passwordEncoder->encodePassword($subscriber,'password'));
        $manager->persist($subscriber);

        // Un admin
        $admin = new User();
        $admin->setEmail('admin@admin.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword($admin,'password'));
        $manager->persist($admin);

        $userArray = [];
        for($i = 0 ; $i < 5; $i++){
            $user = new User();
            $user->setEmail($faker->email);
            $user->setPassword($this->encoder->encodePassword($user, 'password'));
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
            $userArray[] = $user;
        }

        // Sauvegarde des 2 nouveaux utilisateurs :
        $manager->flush();
    }
}
