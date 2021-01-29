<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create('fr_FR');
        
        for ($i = 0; $i < 15; $i++) {
            // Création d'un produit
            $article = new Post();
            $article
                ->setTitle("Article " . $i)
                ->setContent($faker->realText(500))
                ->setCreationDate(new \DateTime())
                ->setPublishedDate(new \DateTime())
                ->setPublished(true)
                ->setSlug("article-" . $i)
                //->setImage()
                ;

            // Sauvegarde en base
            $manager->persist($article);    
        }
        
        // Ecriture effective en base
        $manager->flush();
    }
}
