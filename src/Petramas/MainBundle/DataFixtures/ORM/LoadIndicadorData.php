<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\Indicador as Indicador;

class LoadIndicadorData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $indicadores = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($indicadores['Indicador'] as $reference => $columns)
        {
            $indicador = new Indicador();
            $indicador->setNombre($columns['nombre']);
            $indicador->setEstandar($columns['estandar']);
            $indicador->setInferior($columns['inferior']);
            $indicador->setSuperior($columns['superior']);
            $indicador->setValor($columns['valor']);
            $indicador->setObservacion($columns['observacion']);
            $manager->persist($indicador);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Indicador_'. $reference, $indicador);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'indicadores';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 3;
    }
}