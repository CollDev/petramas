<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\UnidadMedida as UnidadMedida;

class LoadUnidadMedidaData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $unidad_medidas = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($unidad_medidas['UnidadMedida'] as $reference => $columns)
        {
            $unidad_medida = new UnidadMedida();
            $unidad_medida->setNombre($columns['nombre']);
            $unidad_medida->setValor($columns['valor']);
            $manager->persist($unidad_medida);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('UnidadMedida_'. $reference, $unidad_medida);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'unidad_medidas';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 6;
    }
}