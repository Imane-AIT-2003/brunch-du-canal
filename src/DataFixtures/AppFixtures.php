<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Client;
use App\Entity\Table;
use App\Entity\Reservation;
use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    $faker = Factory::create('fr_FR');
    $clients = [];
    for ($i = 0; $i < 20; $i++) {
    $client = new Client();
    $client-> setPseudo($faker->userName());
    $client-> setPrenom($faker->firstName());
    $client-> setEmail($faker->unique()->safeEmail());
    $client-> setTelephone($faker->phoneNumber());

    $manager->persist($client);
    $clients[] = $client;
    }



    $tables = [];
    for ($i = 0; $i < 23; $i++) {
        $table = new Table();
        $table-> setNumero($faker->numberBetween(1, 23));
        $manager->persist($table);
        $tables[] = $table;
    }



    for ($i = 0; $i < 600; $i++) {
        $reservation = new Reservation();
        $reservation-> setDateHeure($faker->dateTimeBetween('now', '+2 months'));
        $reservation-> setClient($faker->randomElement($clients));
        $reservation-> setNbPlace($faker->numberBetween(1, 4));
        $reservation-> setTablePrete($faker->boolean());
        $reservation-> setResaConfirmee($faker->boolean());
        $reservation-> setTableResa($faker->randomElement($tables));

        $manager->persist($reservation);
    }


        $manager->flush();
    }
}
