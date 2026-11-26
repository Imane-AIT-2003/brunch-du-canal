<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $gerant = new User();
        $gerant-> setNom($faker->lastName());
        $gerant-> setPrenom($faker->firstName());
        $gerant-> setEmail($faker->email());
        $gerant-> setTelephone($faker->phoneNumber());
        $gerant-> setPassword($this->passwordHasher->hashPassword($gerant, 'password'));
        $gerant-> setRoles(['ROLE_ADMIN']);

        $manager->persist($gerant);


        for ($i = 0; $i < 10; $i++) {
            $serveur = new User();

            $serveur-> setNom($faker->lastName());
            $serveur-> setPrenom($faker->firstName());
            $serveur-> setEmail($faker->email());
            $serveur-> setTelephone($faker->phoneNumber());
            $serveur-> setPassword($this->passwordHasher->hashPassword($serveur, 'password'));
            $serveur-> setRoles($faker->randomElement([['ROLE_SERVEUR'], ['ROLE_RIEN']]));

            $manager->persist($serveur);

    
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

}
}
