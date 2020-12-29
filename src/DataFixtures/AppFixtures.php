<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Brand;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        require ('vendor/autoload.php');
        $faker= Factory::create('fr_FR');

        for ($i = 0; $i <= 4; $i++) {
            $brand = new Brand();

            $brand->setName($faker->name);

            $manager->persist($brand);
        }

        $manager->flush();
    }
}
