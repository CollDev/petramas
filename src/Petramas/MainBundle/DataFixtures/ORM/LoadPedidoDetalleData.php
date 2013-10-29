<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\PedidoDetalle as PedidoDetalle;

class LoadPedidoDetalleData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $pedidodetalles = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($pedidodetalles['PedidoDetalle'] as $reference => $columns)
        {
            $pedidodetalles = new PedidoDetalle();
            $pedidodetalles->setPedido($manager->merge($this->getReference('Pedido_' . $columns['pedido'])));
            $pedidodetalles->setMaterial($manager->merge($this->getReference('Material_' . $columns['material'])));
            $pedidodetalles->setCantidad($columns['cantidad']);
            $pedidodetalles->setImporte($columns['importe']);
            $manager->persist($pedidodetalles);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('PedidoDetalle_'. $reference, $pedidodetalles);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'pedido_detalles';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 16;
    }
}