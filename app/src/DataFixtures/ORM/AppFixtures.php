<?php

namespace App\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Loader\NativeLoader;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $om)
    {
        $loader = new NativeLoader();
        $objectSet = $loader->loadFile(__DIR__.'/_loader.yaml')->getObjects();

        foreach ($objectSet as $object) {
            $om->persist($object);
        }
        $om->flush();
    }
}
