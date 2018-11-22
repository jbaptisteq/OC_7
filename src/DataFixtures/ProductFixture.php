<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // Create 10 product
        for($p = 1; $p <= 10; $p++) {
            $product = new Product();
            $product->setName("OC-Phone $p")
                    ->setCompany("OpenClassphone")
                    ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus mauris, varius sit amet tortor in, ultrices congue lacus. Vestibulum a lacinia erat, sed rutrum massa. Integer lectus ex, facilisis sit amet vehicula vel, bibendum bibendum tortor. Aliquam erat volutpat. Proin sollicitudin id magna vitae vestibulum. Fusce eu vestibulum nunc. Praesent vitae vestibulum libero, vel laoreet turpis. Aliquam eu odio ac eros posuere pellentesque. In nec tempus mi. Aliquam lacinia fringilla sodales. Integer eget velit tortor. Vestibulum id tellus in ante lobortis tempus nec quis mauris. Aliquam vestibulum dignissim felis a ullamcorper. Proin luctus lectus a massa accumsan ultrices.")
                    ->setValue(mt_rand(800,1500));

            $manager->persist($product);
            $manager->flush();
        }
    }
}
