<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Brand;
use App\Entity\Product;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        require ('vendor/autoload.php');
        $faker= Factory::create('fr_FR');

        for ($i = 0; $i <= 4; $i++) {
            $brand = new Brand();
            $brand->setName($faker->name);

            for ($j = 0; $j <= 4; $j++) {
                $product = new Product();
                $product->setName($faker->name);
                $product->setDescription($faker->name);
                $product->setPrice($i + $j);
                // $product->setSlug($faker->name);
                $product->setBrand($brand);
                $product->setCreatedAt(new \DateTime());
                // $product->setEnabled(true);

                $manager->persist($product);
            }
            $manager->persist($brand);
        }

        $manager->flush();
    }
}
