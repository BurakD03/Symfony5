<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // Création de 2 categories
        for ($i = 0; $i < 7; $i++) {
        $category = new Category();
        $category->setName('Categorie n° '.$i);
        $manager->persist($category);
        $this->addReference('category'.$i, $category);
        }
        $manager->flush();
        
    }
}
