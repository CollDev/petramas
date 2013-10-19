<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\Tarifa as Tarifa;

class LoadTarifaData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $tarifas = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($tarifas['Tarifa'] as $reference => $columns)
        {
            $tarifa = new Tarifa();
            $tarifa->setNombre($columns['nombre']);
            $tarifa->setValor($columns['valor']);
            $manager->persist($tarifa);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Tarifa_'. $reference, $tarifa);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'tarifas';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 7;
    }
}