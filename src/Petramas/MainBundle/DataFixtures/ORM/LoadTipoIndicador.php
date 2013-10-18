<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\TipoIndicador as TipoIndicador;

class LoadTipoIndicadorData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $tipo_indicadores = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($tipo_indicadores['TipoIndicador'] as $reference => $columns)
        {
            $tipo_indicador = new TipoIndicador();
            $tipo_indicador->setNombre($columns['nombre']);
            $manager->persist($tipo_indicador);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('TipoIndicador_'. $reference, $tipo_indicador);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'tipo_indicadores';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 3;
    }
}