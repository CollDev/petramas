<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\Pedido as Pedido;

class LoadPedidoData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $pedidos = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($pedidos['Pedido'] as $reference => $columns)
        {
            $pedido = new Pedido();
            $pedido->setCliente($manager->merge($this->getReference('Cliente_' . $columns['cliente'])));
            $pedido->setEstado($manager->merge($this->getReference('Estado_' . $columns['estado'])));
            $pedido->setFechaProgramacion(new \DateTime("tomorrow"));
            $pedido->setFactura($manager->merge($this->getReference('Factura_' . $columns['factura'])));
            $manager->persist($pedido);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Pedido_'. $reference, $pedido);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'pedidos';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 15;
    }
}