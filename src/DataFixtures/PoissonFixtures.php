<?php

namespace App\DataFixtures;

use App\Entity\Poisson;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PoissonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $poisson = new Poisson();

        $poisson->setNom("Anguille");
        
        $manager->persist($poisson);

        $manager->flush();
    }
}
