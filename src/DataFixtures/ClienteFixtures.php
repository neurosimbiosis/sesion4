<?php

namespace App\DataFixtures;

use App\Entity\Cliente;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ClienteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 5; ++$i) {
            $cliente = new Cliente();
            $cliente->setNombre($faker->name);
            $cliente->setCategoria(Cliente::CATEGORIAS[array_rand(Cliente::CATEGORIAS)]);
            $cliente->setDescripcion($faker->text(200));
            $cliente->setFechaNacimiento($faker->dateTime);

            $manager->persist($cliente);
        }

        $manager->flush();
    }
}
