<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\BoletaRecepcion as BoletaRecepcion;

class LoadBoletaRecepcionData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $boletarecepciones = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($boletarecepciones['BoletaRecepcion'] as $reference => $columns)
        {
            $boletarecepcion = new BoletaRecepcion();
            $boletarecepcion->setCliente($manager->merge($this->getReference('Cliente_' . $columns['cliente'])));
            $boletarecepcion->setUnidad($manager->merge($this->getReference('Unidad_' . $columns['unidad'])));
            $boletarecepcion->setFechaIngreso(new \DateTime("yesterday"));
            $boletarecepcion->setFechaSalida(new \DateTime("tomorrow"));
            $boletarecepcion->setTotal($columns['total']);
            $boletarecepcion->setTara($columns['tara']);
            $boletarecepcion->setNeto($columns['neto']);
            $boletarecepcion->setEstado($manager->merge($this->getReference('Estado_' . $columns['estado'])));
            $manager->persist($boletarecepcion);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('BoletaRecepcion_'. $reference, $boletarecepcion);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'boleta_recepciones';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 14;
    }
}