<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\Incidencia as Incidencia;

class LoadIncidenciaData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $incidencias = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($incidencias['Incidencia'] as $reference => $columns)
        {
            $incidencia = new Incidencia();
            $incidencia->setTipoIncidencia($manager->merge($this->getReference('TipoIncidencia_' . $columns['tipo_incidencia'])));
            $incidencia->setEstado($manager->merge($this->getReference('Estado_' . $columns['estado'])));
            $incidencia->setUnidad($manager->merge($this->getReference('Unidad_' . $columns['unidad'])));
            $incidencia->setFechaIncidencia(new \DateTime("yesterday"));
            $incidencia->setMaquinaria($columns['maquinaria']);
            $incidencia->setObservacion($columns['observacion']);
            $incidencia->setFechaResolucion(new \DateTime("now"));
            $incidencia->setSolucion($columns['solucion']);
            $incidencia->setResponsable($manager->merge($this->getReference('Responsable_' . $columns['responsable'])));
            $manager->persist($incidencia);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Incidencia_'. $reference, $incidencia);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'incidencias';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 12;
    }
}