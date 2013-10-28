<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\Material as Material;

class LoadMaterialData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $materiales = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($materiales['Material'] as $reference => $columns)
        {
            $material = new Material();
            $material->setNombre($columns['nombre']);
            $material->setStock($columns['stock']);
            $material->setTarifa($columns['tarifa']);
            $manager->persist($material);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Material_'. $reference, $material);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'materiales';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 8;
    }
}