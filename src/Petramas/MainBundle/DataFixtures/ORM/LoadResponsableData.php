<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\Responsable as Responsable;

class LoadResponsableData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $responsables = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($responsables['Responsable'] as $reference => $columns)
        {
            $responsable = new Responsable();
            $responsable->setNombre($columns['nombre']);
            $responsable->setEmail($columns['email']);
            $manager->persist($responsable);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Responsable_'. $reference, $responsable);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'responsables';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 10;
    }
}