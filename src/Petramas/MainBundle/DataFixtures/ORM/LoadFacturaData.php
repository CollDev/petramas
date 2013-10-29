<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\Factura as Factura;

class LoadFacturaData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $facturas = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($facturas['Factura'] as $reference => $columns)
        {
            $factura = new Factura();
            $factura->setCliente($manager->merge($this->getReference('Cliente_' . $columns['cliente'])));
            $factura->setCodigo($columns['codigo']);
            $factura->setTotal($columns['total']);
            $factura->setFecha(new \DateTime("yesterday"));
            $manager->persist($factura);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Factura_'. $reference, $factura);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'facturas';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 13;
    }
}