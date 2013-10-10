<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\Cliente as Cliente;

class LoadClienteData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $clientes = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($clientes['Cliente'] as $reference => $columns)
        {
            $cliente = new Cliente();
            $cliente->setEstado($manager->merge($this->getReference('Estado_' . $columns['estado'])));
            $cliente->setRazonSocial($columns['razon_social']);
            $cliente->setRuc($columns['ruc']);
            $cliente->setDireccion($columns['direccion']);
            $manager->persist($cliente);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Cliente_'. $reference, $cliente);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'clientes';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 2;
    }
}