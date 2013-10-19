<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\Unidad as Unidad;

class LoadUnidadData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $unidades = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($unidades['Unidad'] as $reference => $columns)
        {
            $unidad = new Unidad();
            $unidad->setEstado($manager->merge($this->getReference('Estado_' . $columns['estado'])));
            $unidad->setMarca($columns['marca']);
            $unidad->setFechaMantenimiento(new \DateTime('now'));
            $unidad->setKilometraje($columns['kilometraje']);
            $unidad->setTiempo(new \DateTime('now'));
            $manager->persist($unidad);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Unidad_'. $reference, $unidad);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'unidades';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 9;
    }
}