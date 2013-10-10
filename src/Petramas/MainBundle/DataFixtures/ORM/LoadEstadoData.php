<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\Estado as Estado;

class LoadUserData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $estados = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($estados['Estado'] as $reference => $columns)
        {
            $estado = new Estado();
            $estado->setFirstname($columns['nombre']);
            $manager->persist($estado);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Estado_'. $reference, $estado);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'estados';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 1;
    }
}