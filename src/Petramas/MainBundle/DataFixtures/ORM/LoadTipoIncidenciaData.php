<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\TipoIncidencia as TipoIncidencia;

class LoadTipoIncidenciaData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $tipo_incidencias = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($tipo_incidencias['TipoIncidencia'] as $reference => $columns)
        {
            $tipo_incidencia = new TipoIncidencia();
            $tipo_incidencia->setNombre($columns['nombre']);
            $manager->persist($tipo_incidencia);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('TipoIncidencia_'. $reference, $tipo_incidencia);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'tipo_incidencias';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 4;
    }
}