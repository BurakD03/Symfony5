<?php

namespace App\DataFixtures;

use App\Entity\Deal;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DealFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // Création de 2 categories
/*        for ($i = 0; $i < 3; $i++) {
            $deal = new Deal();
            $deal->setName('Deal n° '.$i);
            $deal->setDescription('Description n° '.$i);
            $deal->setPrice($i);
            $deal->setEnable(1);
            $deal->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE));
            $manager->persist($deal);

            }
*/
        // Création de 2 categories
        $repo_cat = $manager->getRepository(Category::class);
        $categorys = $repo_cat->findAll();
        for ($i = 0; $i < 7; $i++) {
            $deal = new Deal();
            $deal->setName('Deal n° '.$i);
            $deal->setDescription('Description n° '.$i);
            $deal->setPrice($i);
            $deal->setEnable(1);
            $deal->addCategory($this->getReference('category'.$i));
            $manager->persist($deal);

        }
     
        $manager->flush();
    }
}
