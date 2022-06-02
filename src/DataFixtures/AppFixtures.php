<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    protected UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->hasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        // $product = new Product();
        // $manager->persist($product);

        $admin = new User();

        $hashedPassword = $this->hasher->hashPassword($admin, 'admin');

        $admin->setFirstName($faker->firstName())
            ->setLastName($faker->lastName())
            ->setPassword($hashedPassword)
            ->setUsername($faker->userName())
            ->setEmail("admin@gmail.com")
            ->setRegisteredAt(new \DateTimeImmutable())
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        for ($u = 0; $u < 10; $u++) {
            $user = new User();

            $hashedPassword = $this->hasher->hashPassword($user, 'password');

            $user->setFirstName($faker->firstName())
                ->setLastName($faker->lastName())
                ->setPassword($hashedPassword)
                ->setUsername($faker->userName())
                ->setRegisteredAt(new \DateTimeImmutable())
                ->setEmail("user$u@gmail.com");
            $manager->persist($user);
        }

        $manager->flush();
    }
}
