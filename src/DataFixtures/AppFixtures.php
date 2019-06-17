<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Bar;
use App\Entity\Baz;
use App\Entity\Foo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $foo = new Foo();
        $foo->setName('Foo 1');

        $bar = new Bar();
        $bar->setId(1);
        $bar->setName('Bar 1');

        $items = [$foo, $bar];

        foreach ($items as $item) {
            $manager->persist($item);
        }

        $manager->flush();
    }
}
